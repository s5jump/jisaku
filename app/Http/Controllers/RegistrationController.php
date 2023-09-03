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
    public function profileDelete(Request $request){
        $user = Auth::user();
        //$user = User::find($request->input('id'));
        $user->delete();
        
        // $user->save();
        return redirect('/',[
            
            
        ]);
    }

     //店舗詳細
     public function shopDetail(Shop $shop ){
        return view('shop',[
            'shop'=>$shop,
        ]);
       
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
        function adminUserList(Post $post){
            
            return view('admin.user_list',[

            ]);
        }
        //ユーザーリスト確認詳細
        function adminUserListDetail(){
            return view('admin.user_list_detail');
        }
        //投稿リスト
        function adminPostList(Comment $comment){

            // $post=Post::join('comments','posts.post_id','=','posts.id');

            //$comment = Comment::orderBy('post_id', 'DESC')->take(20)->get();
            return view('admin.post_list',[
                'comment'=>$comment,
            ]);
        }
    

   

    //店舗管理者
   
    public function shopRegister(){
        return view ('auth.shop_register');
    }
    function shopRegisters(Request $request){
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->image=$request->image;
        $user->role=2;
        $user->password=Hash::make($request['password']);

        $user->save();
        return view ('auth.shop_registration');
        // return redirect('/');
    }
       
         //店舗新規登録
        //  public function shopRegistration(){
        //     return view ('auth.shop_registration');
        // }
        public function shopNew(){
            return view ('auth.register_new');
        }
        public function shopNews(Shop $shop,Request $request){
            $record=$shop;
       
            $shop->name=$request->name;
            $shop->adress=$request->adress;
            $shop->comment=$request->comment;

            $shop->image=$request->image;
            //$shop->image=null;
            $shop->user_id=Auth::id();
            //$shop->user_id=1;
            
            //Auth::user()->save($shop);
            $shop->save();

            return  redirect('/');
        }
        
         //店舗管理者店舗情報
         public function shopHome(Shop $shop){
            //ログインしているユーザーのみ　https://biz.addisteria.com/how_to_get_data/
            $auth=auth()->user()->id;
            $shop=Shop::where('user_id', $auth)->get();
            //return view('auth.home', compact('shops'));
            // $shop=Shop::orderBy('created_at', 'desc')->where('user_id',Auth::id())->get();
            return view ('auth.home',[
                'shops'=>$shop,
            ]);
        }
        //店舗編集
        public function editShopForm(Shop $shop){
            
            return view ('auth.edit_shop',[
                'shop'=>$shop,
            ]);
        }

        public function editShop(Shop $shop, Request $request){
            $record=$shop;

            $shop->name=$request->name;
            $shop->adress=$request->adress;
            $shop->comment=$request->comment;
            $shop->image=$request->image;
            $shop->user_id=Auth::id();
        
            Auth::user()->shop()->save($record);
            
            return redirect('/');

        }

        //店舗削除
        public function ShopDelete(Shop $shop){
            $shop->delete();
        
            return redirect('/');
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



