<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shop;

use App\Post;

use App\Comment;

use App\Bookmark;

class RegistrationController extends Controller
{
    //新規登録内容確認 https://www.kamome-susume.com/laravel-img-upload/
    public function registerCheck(Request $request){
        $image = $request->file('image');//リクエストした画像を取得

        if(isset($image)){//画像がセットされていれば保存実行
            $path = $image->store('public');//publicに保存

            if($path){//処理実行できたらDBに保存処理実行
                User::create([//DBに登録
                    'image'=>$path,
                ]);
            }
        }

        return view('auth.register_check');
    }

    //新規登録完了

    //店舗新規登録
    public function shopRegister(){
        return view ('auth.shop_register');
    }

    //パスワード再設定
    public function password(){
        return view('password');
    }

    //新規投稿
    public function createPostForm(){
        return view('create_post',[

        ]);
    }

    public function createPost(Request $request){
        $post=new Post;

        $columns=['title','review','comment','image'];
        foreach($columns as $column){
            $post->$column=$request->$column;
        }

        //Auth::user()->post()->save($post);
        $post->save();

        return redirect('/');
    }
}
