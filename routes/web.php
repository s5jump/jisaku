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

//店舗詳細
Route::get('/shop/{shop}/detail',[DisplayController::class,'shopDetail'])->name('shop.detail');

//新規登録内容確認
Route::post('/register/{register}/register',[RegistrationController::class,'registerCheck'])->name('register.check');



//新規登録完了

//店舗新規登録
Route::get('/register/shop',[RegistrationController::class,'shopRegister'])->name('shop.register');

//パスワード再設定
Route::get('/password/email',[RegistrationController::class,'password'])->name('password');




//});
