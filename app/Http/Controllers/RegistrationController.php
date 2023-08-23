<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Collection;

use App\User;

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
        $columns=['name','email','image'];
        foreach($columns as $column){
            $user->$column=$request->$column;
        }
        $user->password=Hash::make($request['password']);

        $user->save();
        return redirect('/');
    }
   
    //プロフィール削除
    public function profileDelete(Request $post){
        $user = Auth::user();
        // //$user=User::find($id)->delete();
       
        $user = User::find($post->input('post'));
        $user->delete();
        
        // $user->save();
        return redirect('/');
    }
    

    //店舗新規登録
    public function shopRegister(){
        return view ('auth.shop_register');
    }


    
     //店舗詳細
     public function shopDetail(shop $shop){
        $shop = Shop::all();
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
        
        $post->user_id=Auth::id();
        $post->shop_id=Auth::id();
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
        $post->user_id=Auth::id();
        $post->shop_id=Auth::id();
       
        Auth::user()->post()->save($record);
        //$record->save();
        return redirect('/');
    }

    //投稿削除
    public function editPosts(Post $post, CreateDate $request){
        $record=$post;

        $columns=['title','comment','image'];
        foreach($columns as $column){
            $record->$column=$request->$column;
        }
        $record->review=$request->review_id;
        $post->user_id=Auth::id();
        $post->shop_id=Auth::id();
       
        Auth::user()->post()->save($record);
        //$record->save();
        return redirect('/');
    }
    public function postDelete(Post $post){
        $post->delete();
      
        return redirect('/');
    }

   //違反報告
   public function breachForm(){
    return view ('breach');
   }

   public function breach(Comment $comment, Request $request){
    $comment=new Comment;

    $comment->text=$request->text;
    $comment->user_id=Auth::id();
    $comment->post_id=Auth::id();
    

    $comment->save();

    return redirect('/');
   }

   //ブックマーク
//    public function bookmark(Request $request){
//     $bookmark=new Bookmark;
//     $bookmark->shop_id = $request->shop_id;
//     $bookmark->user_id = Auth::user()->id;

//     $bookmark->save();
//     return redirect ('/',[
//         'bookmark'=>$bookmark,
//     ]);
//     }

//    public function bookmarkForm(Request $request){
//     return view ('bookmark',[
//         'bookmark'=>$bookmark,
//     ]);
//     }
   







    
    public function update(CreateData $request){
        
    }
}



