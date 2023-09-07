<?php

namespace App\Services;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersService
{

	/**
     * パスワードリセット
     */

    // メールアドレスからユーザー情報取得
    public static function findFromMail(string $mail)
    {
        $user = \App\Models\User::where('email', $mail)->first();
        return $user;
    }

    // トークン, 有効期限を登録
    public static function updateOrCreateUser(int $userId)
    {
        $now = Carbon::now();
        // $userIdをハッシュ化
        $hashedToken = hash('sha256', $userId);
        $userToken = \App\Models\User::updateOrCreate(
                        [
                            'id' => $userId,
                        ],
                        [
                        // $hashedTokenを含むトークンを作成
                        'reset_password_access_key' => uniqid(rand(), $hashedToken),
                        // トークンの有効期限を現在から24時間後に設定
                        'reset_password_expire_data' => $now->addHours(24)->toDateTimeString()
                        ]);
        return $userToken;
    }

    // トークンからユーザー情報を取得
    public static function getUserTokenFromUser()
    {
        $request = request();
        $token = $request->reset_token;
       
        $userToken = \App\Models\User::where('reset_password_access_key', $token)->first();
        //DD($token, User::get());
        return $userToken;
    }

    // トークンからメールアドレスを取得
    public static function getUserMailByResetToken()
    {
        $request = request();
        $resetToken = $request->reset_token;
        //DD(User::get());
        $userMail = \App\Models\User::select('email')
        ->where('reset_password_access_key', $resetToken)->first();
        return $userMail;
    }

    // パスワード更新
    public static function updateUserPassword(string $password, int $userId)
    {
        $request = request();

        
        \App\Models\User::where('id', $userId)->update(['password' => Hash::make($request->password)]);
    }
}
