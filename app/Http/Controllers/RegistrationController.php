<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests\CreateData;

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

    //プロフィール編集 https://qiita.com/crosawassant/items/d8b434f0bc98455165b4
    public function profile(){
        return view ('auth.profile');
    }
    public function profileEdit(Request $request){
        $user = Auth::user();
        $columns=['name','email','password','image'];
        foreach($columns as $column){
            $user->$column=$request->$column;
        }

        $user->save();
        return redirect('/');
    }
   
    //プロフィール削除
    
    public function profileDelete(Request $request){
        $record=$request;

        $record['del_flg']=1;
        $record->save();
        return redirect('/');
    }


    //店舗新規登録
    public function shopRegister(){
        return view ('auth.shop_register');
    }
    
     //店舗詳細
     public function shopDetail(shop $shop){
        return view('shop',[
            'shops'=>$shop,
        ]);
       
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
        //var_dump($request->all());
        $columns=['title','comment','image'];
        foreach($columns as $column){
            $post->$column=$request->$column;
        }
        $post->review=$request->review_id;
        $post->user_id=1;
        $post->shop_id=1;
        //右はどの値を入れるか
        
        //Auth::user()->post()->save($post);
        $post->save();

        return redirect('/');
    }

    //投稿編集
    public function editPostForm(Post $post){
        return view ('edit_post',[
            'posts'=>$post,
        ]);
    }

    public function editPost(Post $post, Request $request){
        $record=$post;

        $columns=['title','comment','image'];
        foreach($columns as $column){
            $record->$column=$request->$column;
        }
        $record->review=$request->review_id;
        $record->user_id=1;
        $record->shop_id=1;
       
        $record->save();
        return redirect('/');
    }

    //投稿削除
    public function postDelete(Post $post){
        $record=$post;
        $record['del_flg']=1;
        
        $record->save();
        return redirect('/');
    }













    
    public function update(CreateData $request){

    }
}



