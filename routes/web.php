<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => 'auth'],function(){
    //プロフィール編集
    Route::get('/profile',[RegistrationController::class,'profile'])->name('profile');
    Route::post('/profile',[RegistrationController::class,'profileEdit'])->name('profile.edit');

    //プロフィール削除
    Route::get('/profile/{post}/delete',[RegistrationController::class,'profileDelete'])->name('profile.delete');
    //Route::post('/profile/{post}/delete',[RegistrationController::class,'profileDeletes']);

    //新規投稿post
    Route::get('/create_post',[RegistrationController::class,'createPostForm'])->name('create.post');
    Route::post('/create_post',[RegistrationController::class,'createPost']);

    //自分の投稿一覧
    Route::get('/my_post',[DisplayController::class,'myPost'])->name('my.post');

     //投稿編集
     Route::get('/edit/post/{post}',[RegistrationController::class,'editPostForm'])->name('edit.post');
     Route::post('/edit/post/{post}',[RegistrationController::class,'editPost']);
 
     //投稿削除
     Route::get('/post/delete/{post}',[RegistrationController::class,'postDelete'])->name('post.delete');
     Route::post('/post/delete/{post}',[RegistrationController::class,'postDeletes']);

    //違反報告
    Route::get('/breach',[RegistrationController::class,'breachForm'])->name('breach');
    Route::post('/breach',[RegistrationController::class,'breach']);

    //ブックマークお気に入り
    Route::get('/bookmark',[RegistrationController::class,'bookmarkForm'])->name('bookmark.form');
    Route::get('/bookmark',[RegistrationController::class,'bookmark'])->name('bookmark');

    //店舗管理者ページへ
    Route::group(['prefix' => 'admin'], function () {
        //店舗管理者
        Route::get('/register/shop',[RegistrationController::class,'shopRegister'])->name('shop.register');
        Route::post('/register/shop',[RegistrationController::class,'shopRegisters']);
        //店舗管理者店舗情報
        Route::get('/home/shop',[RegistrationController::class,'shopHome'])->name('shop.home');
        //店舗新規登録
        Route::get('/new/shop',[RegistrationController::class,'shopNew'])->name('shop.new');
        Route::post('/new/shop',[RegistrationController::class,'shopNews']);
        });
        //店舗編集
        Route::get('/edit/shop/{shop}',[RegistrationController::class,'editShopForm'])->name('edit.shop');
        Route::post('/edit/shop/{shop}',[RegistrationController::class,'editShop']);
        //店舗削除
        Route::get('/shop/delete/{shop}',[RegistrationController::class,'shopDelete'])->name('shop.delete');
        Route::post('/shop/delete/{shop}',[RegistrationController::class,'shopDeletes']);



});

Route::get('/', [DisplayController::class,'index']);



//投稿詳細
Route::get('/post/{post}/detail',[DisplayController::class,'postDetail'])->name('post.detail');

//店舗情報一覧
Route::get('/shop_information',[DisplayController::class,'shopInformation'])->name('shop.information');
//店舗詳細
Route::get('/shop',[RegistrationController::class,'shopDetail'])->name('shop.detail');






//管理者ページ
Route::group(['middleware' => ['admin.auth']], function () {
    Route::get('/admin', 'admin\AdminMainController@show')->name('toppage');
    Route::post('/admin/logout', 'admin\AdminLogoutController@logout');

});
    Route::group(['prefix' => 'admin'], function () {
        //新規登録
        Route::get('/admin/register',[RegistrationController::class,'adminRegister'])->name('admin.register');
        Route::post('/admin/register',[RegistrationController::class,'adminRegisters']);
        //ログイン
        Route::get('/login', 'admin\AdminLoginController@showForm');
        Route::post('/login', 'admin\AdminLoginController@login');


        //ユーザーリスト
        Route::get('/admin/user_list',[RegistrationController::class,'adminUserList'])->name('admin.user.list');
        //ユーザーリスト詳細
        Route::get('/admin/user_list/detail',[RegistrationController::class,'adminUserListDetail'])->name('admin.user.list.detail');

        //投稿リスト
        Route::get('/admin/post_list',[RegistrationController::class,'adminPostList'])->name('admin.post.list');

    });











Route::prefix('reset')->group(function () {
//パスワード再設定画面へ
    Route::get('/password',[UsersController::class,'password'])->name('password');
    //Route::post('/password',[UsersController::class,'password'])->name('password');
        //メール送信
       // Route::get('/password/email',[UsersController::class,'passwordEmail'])->name('password.email');
        Route::post('/password/email',[UsersController::class,'passwordEmail'])->name('password.email');
        // メール送信完了
        Route::get('/password/send',[UsersController::class,'passwordSend'])->name('password.send');
        // パスワード再設定
        Route::get('/password/reset',[UsersController::class,'passwordReset'])->name('password.reset');
        // パスワード更新
        Route::post('/password/update',[UsersController::class,'passwordResetUpdate'])->name('password.reset.update');

});






