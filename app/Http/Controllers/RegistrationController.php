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

use Illuminate\Validation\Rule;

class RegistrationController extends Controller
{
    //新規登録
    public function register(){
        return view ('auth.register');
    }
    public function registerEdit(Request $request){
        $user = new User;

        //dd($request);
        $columns=['name','email','image'];
        foreach($columns as $column){
            $user->$column=$request->$column;
        }
        $user->role=0;
        $user->password=Hash::make($request['password']);
        

        $user->save();
        return redirect('/');
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
        $user->role=0;
        $user->password=Hash::make($request['password']);

        $user->save();
        return redirect('/');
    }
   
    //プロフィール削除
    //https://qiita.com/crosawassant/items/a6e3e9b1aedf566b2d27
    public function profileDeletes(User $user){
      
        $user =User::find(Auth::id())->delete();
       
        return redirect('/',[
        ]);
    }

     //店舗詳細
     public function shopDetail(Shop $shop ){
        $bookmark_model=new Bookmark;
        $shop=Shop::where('id',$shop->id)->withCount('bookmarks')->first();

        //$post = Post::All();
        return view('shop',[
            'shop'=>$shop,
            'bookmark_model'=>$bookmark_model,
        ]);
       
    }
    //自分の投稿詳細
    
    public function myPostDetails(Post $post){
       
         $posts=Post::orderBy('created_at', 'desc')->where('user_id',Auth::id())->get();
         

        return view('my_post_detail',[
            'posts'=>$post,
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
    
     
       
        
        
    

               
                 //店舗新規登録
                
                public function shopNew(){
                    return view ('auth.register_new');
                }
                public function shopNews(Shop $shop,Request $request){
                    $record=$shop;

                    //https://progtext.net/programming/laravel-validation/
                    $request->validate([
                        'name' => ['required', 'string','max:255'],
                        'adress' => ['required','max:255'],
                        'comment'=>['max:255','required'],
                    ]);
               
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
                   
                    $shops=Shop::orderBy('created_at', 'desc')->where('user_id',Auth::id())->get();
                  
                    return view ('auth.home',[
                        'shops'=>$shops,
                    ]);
                }

                //自店舗に寄せられたレビュー一覧
                public function shopHomeReview(Post $post){
                   // $shop_id=$request->input('shop_id');
                   //$shop_id=$request->shop_id;
                   
                    $post=Post::orderBy('created_at', 'desc')->where('shop_id',3)->get();
                    //dd($post);
                    // $post=Post::all();
                    return view('shop_review',[
                        'post'=>$post,
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
        
                    $request->validate([
                        'name' => ['required', 'string','max:255'],
                        'adress' => ['required','max:255'],
                        'comment'=>['max:255','required'],
                    ]);

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
                //店舗管理者登録ページへ
                public function shopRegister(){
                    return view('shopregister');
                }
        


    //新規投稿
    public function createPostForm(){
        return view('create_post',[

        ]);
    }

    public function createPost(Request $request){
        $post=new Post;

        $request->validate([
            'title' => ['required', 'string','max:255'],
            //'review' => ['required'],
            'comment'=>['max:255','required'],
            //'image' => ['file'],
        ]);

        //https://biz.addisteria.com/image-upload/
        //dd($request-> file('image'));
         // 画像ファイルの保存場所指定
        //  if(request('image')){
        //     $filename=request()->file('image')->getClientOriginalName();
        //     $inputs['image']=request('image')->storeAs('public/images', $filename);
        // }

        // postを保存
        //$post->create($inputs);

        //var_dump($request->all());
        $columns=['title','comment','image'];
        foreach($columns as $column){
            $post->$column=$request->$column;
        }
        $post->review=$request->review_id;
        
        $post->user_id=Auth::id();
        $post->shop_id=1;
        //$shop=Shop::where('id',$shop->id)
        //右はどの値を入れるか
        
        
        $post->save();

        return redirect('/');
    }

   

    //投稿編集
    public function editPostForm(Post $post){
        return view ('edit_post',[
            'posts'=>$post,
        ]);
    }

    public function editPost(Post $post, CreateData $request){
        $record=$post;

        $columns=['title','comment','image'];
        foreach($columns as $column){
            $record->$column=$request->$column;
        }
        $record->review=$request->review_id;
        $post->user_id=Auth::id();
        $post->shop_id=1;
       
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
   public function breachForm(Post $post){
    return view ('breach',[
        'post'=>$post,
    ]);
   }

   public function breach(Request $request){
    $comment=new Comment;

    $comment->text=$request->text;
    $comment->user_id=Auth::id();
    $comment->post_id=1;
    
    
    //dd($comment);
    

    $comment->save();

    return redirect('/');
   }

   //ブックマーク
   //https://shiro-changelife.com/laravel-ajax-like/
   public function bookmark(Request $request){
 
    $id = Auth::user()->id;
    $shop_id = $request->shop_id;
    $bookmark = new Bookmark;
    $shop = Shop::findOrFail($shop_id);

    // 空でない（既にいいねしている）なら
    if ($bookmark->bookmark_exist($id,$shop_id)) {
        //likesテーブルのレコードを削除
        $bookmark = Bookmark::where('shop_id', $shop_id)->where('user_id', $id)->delete();
    } else {
        //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
        $bookmark = new Bookmark;
        $bookmark->shop_id = $request->shop_id;
        $bookmark->user_id = Auth::user()->id;
        $bookmark->save();
    }
    $exist = Bookmark::where('shop_id', $shop_id)->where('user_id', $id)->first();
    //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
    $shopBookmarksCount = $shop->loadCount('bookmarks')->bookmarks_count;

    //一つの変数にajaxに渡す値をまとめる
    //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
    $json = [
        'exist' => $exist,
        'shopBookmarksCount' => $shopBookmarksCount,
    ];
    //下記の記述でajaxに引数の値を返す
    return response()->json($json);
    }

    //ブックマーク一覧
    public function bookmarkForm(Bookmark $bookmark){
        $bookmark = Bookmark::orderBy('created_at','desc')->where('user_id',Auth::id())->get();
        //$shop=Shop::where('id',$shop->id)->withCount('bookmarks')->first();
        //dd($bookmark[0]['shop']);
        return view('bookmark',[
            'bookmark' => $bookmark,
            //'shop'=>$shop,
        ]);
       }

       public function bookmarkDetail(Bookmark $bookmark){
        //dd($bookmark['shop']);
        return view('bookmark_detail',[
            'bookmark'=>$bookmark,
        ]);
       }
    

   

    //管理者　ユーザーリスト
       function adminUserList(Post $post){
            // $record=$posts->find();
            $count=Post::where('del_flg',1)->take(10)->get()->count();
           $posts=Post::where('del_flg',1)->take(10)->get();
           //dd($posts[0]['user']);
            return view('admin.user_list',[
                'posts'=>$posts,
                'count'=>$count,
                //'user_id' => $user_id,
            ]);
        }
    //ユーザー利用停止にする
    function adminUserListDeletes(User $user,int $id){
        $record=$user->find($id);
        //dd($record);
        $record['del_flg']=1;
       
         $record->save();
        return view('admin.toppage');
    }

    //投稿リスト
    function adminPostList(Post $post){
        //https://awesome-programmer.hateblo.jp/entry/2019/07/03/162835
        // $count = \DB::table('comments')
        //     ->join('posts', 'comments.comments', '=', 'posts.id')
        //     ->select(\DB::raw('count(*) as post_count, posts.id'))
        //     ->groupBy('comments.id')
        //     ->get();

    //    $comment = Comment::orderBy('post_id', 'DESC')->take(20)->get();
    //     $count=Comment::where('post_id', 2)->get()->count();
            //https://qiita.com/naoqoo2/items/ef53ae0cc926c287b9ed#:~:text=%E3%83%AA%E3%83%AC%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E5%85%88%E3%81%AE%E3%83%AC%E3%82%B3%E3%83%BC%E3%83%89%E6%95%B0%E3%81%A7%E3%82%BD%E3%83%BC%E3%83%88%E3%81%97%E3%81%9F%E3%81%84withCount,%28%27%E3%83%AA%E3%83%AC%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E5%90%8D%27%29%E3%81%A7%E5%8F%96%E5%BE%97%E3%81%97%E3%81%A6%E3%83%AA%E3%83%AC%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E5%90%8D_count%E3%82%92%E6%8C%87%E5%AE%9A%E3%81%99%E3%82%8B%E3%80%82
    $comment=Post::withCount('comment')
            ->orderBy('comment_count', 'desc')
            ->take(20)
            ->get();

        
        //dd($comment[0]['post']);
        return view('admin.post_list',[
            'comment'=>$comment,
            //'count'=>$count,
           
        ]);
    }

        //管理者　投稿非表示にする
       
        public function adminPostListDelete(Post $post,int $id){
            $record=$post->find($id);
          
           $record['del_flg']=1;
            //dd($record);
            $record->save();

            return view('admin.toppage',[
            ]);
        }
       


    
    public function update(CreateData $request){
        
    }
}



