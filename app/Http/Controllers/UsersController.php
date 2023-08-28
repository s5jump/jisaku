<?php
//https://qiita.com/rikako_hira/items/4626090769f4023d4107#%E3%81%AF%E3%81%98%E3%82%81%E3%81%AB

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Requests\ResetInputMailRequest;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Exception;

use App\Http\Requests\ResetPasswordRequest;

class UsersController extends Controller
{

    private $userRepository;
    private const MAIL_SENDED_SESSION_KEY = 'user_reset_password_mail_sended_action';

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    //パスワード再設定画面へ
    public function password(){
        return view('users.password');
    }

    //メール送信処理
    public function passwordEmail(ResetInputMailRequest $request)
    {
        try {
            // ユーザー情報取得
            $user = UsersService::findFromMail($request->email);
            $userToken = UsersService::updateOrCreateUser($user->id);

            // メール送信
            Log::info(__METHOD__ . '...ID:' . $user->id . 'のユーザーにパスワード再設定用メールを送信します。');
            Mail::send(new ResetPasswordMail($user, $userToken));
            Log::info(__METHOD__ . '...ID:' . $user->id . 'のユーザーにパスワード再設定用メールを送信しました。');
        } catch(Exception $e) {
            Log::error(__METHOD__ . '...ユーザーへのパスワード再設定用メール送信に失敗しました。 request_email = ' . $request->mail . ' error_message = ' . $e);
            return redirect()->route('reset.form')
                ->with('flash_message', '処理に失敗しました。時間をおいて再度お試しください。');
        }
        // 不正アクセス防止セッションキー
        session()->put(self::MAIL_SENDED_SESSION_KEY, 'user_reset_password_send_email');

        return redirect()->route('password.send');
    }

    // メール送信完了
    public function passwordSend()
    {
        // 不正アクセス防止セッションキーを持っていない場合
        if (session()->pull(self::MAIL_SENDED_SESSION_KEY) !== 'user_reset_password_send_email') {
            return redirect()->route('password')
                ->with('flash_message', '不正なリクエストです。');
        }
        return view('users.password_send');
    }

    // パスワード再設定
    public function passwordReset(Request $request)
    {
         // 署名付きURLではない場合
    	if (!$request->hasValidSignature()) {
            abort(403, 'URLの有効期限が過ぎたためエラーが発生しました。パスワード再設定メールを再発行してください。');
        }

        $resetToken = $request->reset_token;
        $userMail = UsersService::getUserMailByResetToken($resetToken);

        try {
            // ユーザー情報取得
            $userToken = UsersService::getUserTokenFromUser($resetToken);
        } catch (Exception $e) {
            Log::error(__METHOD__ . ' UserTokenの取得に失敗しました。 error_message = ' . $e);
            return redirect()->route('password')
                ->with('flash_message', __('パスワード再設定メールに添付されたURLから遷移してください。'));
        }
        return view('users.password_reset');
    }

    // パスワード更新
    public function passwordResetUpdate(ResetInputMailRequest $request)
    {
        try {
            // ユーザー情報取得
            $userToken = UsersService::getUserTokenFromUser($request->reset_token);
            // パスワード暗号化
            $password = encrypt($request->password);
            UsersService::updateUserPassword($password, $userToken->id);
            Log::info(__METHOD__ . '...ID:' . $userToken->user_id . 'のユーザーのパスワードを更新しました。');
        } catch (Exception $e) {
            Log::error(__METHOD__ . '...ユーザーのパスワードの更新に失敗しました。...error_message = ' . $e);
            return redirect()->route('password')
                ->with('flash_message', __('処理に失敗しました。時間をおいて再度お試しください。'));
        }
        return view('users.password_reset_update');
    }
}
