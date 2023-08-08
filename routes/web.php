<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;

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

//Route::group(['middleware' => 'auth'],function(){

Route::get('/', [DisplayController::class,'index']);

//投稿詳細
Route::get('/post/{post}/detail',[DisplayController::class,'postDetail'])->name('post.detail');

//店舗情報一覧
Route::get('/shop_information',[DisplayController::class,'shopInformation'])->name('shop.information');

//店舗詳細
Route::get('/shop_detail',[RegistrationController::class,'shopDetail'])->name('shop.detail');

//新規登録内容確認
Route::post('/register/{register}/register',[RegistrationController::class,'registerCheck'])->name('register.check');

//プロフィール編集
Route::get('/profile',[RegistrationController::class,'profile'])->name('profile');
Route::post('/profile',[RegistrationController::class,'profileEdit'])->name('profile.edit');

//プロフィール削除
Route::get('/profile_delete',[RegistrationController::class,'profileDelete'])->name('profile.delete');
Route::post('/profile_delete',[RegistrationController::class,'profileDeletes'])->name('profile.deletes');

//店舗新規登録
Route::get('/register/shop',[RegistrationController::class,'shopRegister'])->name('shop.register');

//パスワード再設定
Route::get('/password/email',[RegistrationController::class,'password'])->name('password');

//新規投稿post
Route::get('/create_post',[RegistrationController::class,'createPostForm'])->name('create.post');
Route::post('/create_post',[RegistrationController::class,'createPost']);

//});
