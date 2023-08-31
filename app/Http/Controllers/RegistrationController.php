<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Collection;

use App\Models\User;

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
       
        $user = User::find($post->input('post'));
        $user->delete();
        
        // $user->save();
        return redirect('/');
    }
    
    //管理者登録
    function adminRegister(){
        return view('admin.register');
      }

    function adminRegisters(Request $request){
        $user=new User;
       
        $user->name=$request->name;
        $user->email=$request->email;
        $user->image=$request->image;
        
        $user->role=1;

        $user->password=Hash::make($request['password']);

        $user->save();

        return view('admin.toppage');
    }
    //管理者　ユーザーリスト確認
        function adminUserList(){
            return view('admin.user_list');
        }
        //ユーザーリスト確認詳細
        function adminUserListDetail(){
            return view('admin.user_list_detail');
        }
        //投稿リスト
        function adminPostList(Comment $comment){
            return view('admin.post_list',[
                'comment'=>$comment,
            ]);
        }
    

   

    //店舗管理者新規登録
    public function shopRegister(){
        return view ('shop.register');
    }
    // public function shopRegisters(Request $request){

    //        //検索 
    //        $keyword = $request->input('keyword');
    //        $review=$request->input('review');
   
           
    //        $posts=Post::query();
          
    //        $posts=Post::join('shops','posts.shop_id','=','shops.id');
               
   
    //        //$keyword　が空ではない場合、検索処理を実行します
    //        if (!empty($keyword)) {
    //            $posts->where(function ($posts) use ($keyword) {
    //                $posts->where('posts.title', 'like' , "%{$keyword}%")
    //                    ->orWhere('posts.comment', 'like', "%{$keyword}%")
    //                    ->orWhere('shops.adress', 'like', "%{$keyword}%");
    //            });
    //        }  
          
    //        if (isset($review)) {
    //            $posts->where('review', $review);
    //        }
         
    //        $posts=Post::orderBy('created_at', 'desc')->get()->toArray();
          
          
    //     $user=new User;
    //     // $shop=new Shop;

    //     $user->name=$request->name;
    //     $user->email=$request->email;
    //     $user->image=$request->image;
    //     $user->password=Hash::make($request['password']);
    //     $user->role=2;

    //     // $shop->name=$request->name;
    //     // $shop->adress=$request->adress;
    //     // $shop->comment=$request->comment;
    //     // $shop->image=$request->image;

    //     $user->save();


    //     return view ('shop.home',[
    //         'posts'=>$posts,
    //           'keyword'=>$keyword,
    //           'review'=>$review,
    //     ]);
    // }
    //店舗管理者ホームページ
    // public function shopHome(){
    //     return view ('shop.home',[
            
    //     ]);
    // }


    
     //店舗詳細
     public function shopDetail(shop $shop){
        $shop = Shop::all();
        return view('shop',[
            'shops'=>$shop,
        ]);
       
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
   public function bookmark(Request $request)
{
    $user_id = Auth::user()->id; //1.ログインユーザーのid取得
    $post_id =Auth::id();//2.投稿idの取得
    $shop_id =Auth::id(); 
    $already_liked = Bookmark::where('user_id', $user_id)->where('post_id', $post_id)->where('shop_id', $shop_id)->first(); //3.

    if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
        $bookmark = new Bookmark; //4.Bookmarkクラスのインスタンスを作成
        $bookmark->post_id = Auth::id(); //Bookmarkインスタンスにpost_id,user_id,shop_idをセット
        $bookmark->user_id = Auth::user()->id;
        $bookmark->shop_id = Auth::id();
        $bookmark->save();
    } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
        Bookmark::where('post_id', $post_id)->where('user_id', $user_id)->where('shop_id', $shop_id)->delete();
    }
    //5.この投稿の最新の総いいね数を取得
    // $review_likes_count = Review::withCount('likes')->findOrFail($review_id)->likes_count;
    // $param = [
    //     'review_likes_count' => $review_likes_count,
    // ];
    // //6.JSONデータをjQueryに返す
    // return response()->json($param); 
    

    // return view('shop',[
    // //    'bookmark'=>$bookmark,
    //       'request'=>$request,
    
    // ]);
}
   







    
    public function update(CreateData $request){
        
    }
}



