<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Shop;

use App\Models\User;

use App\Post;

use App\Comment;

use App\Bookmark;

use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    public function index(Request $request){
        $user_id = Auth::id();


        //検索 
        $keyword = $request->input('keyword');
        $review=$request->input('review');

        //$posts = Post::all();
        //$posts=Post::query()->latest();
        $posts=Post::query();
        //DD($posts);
        //join https://qiita.com/kamome_susume/items/b37709e1ba29abacdbd9
        $posts=Post::join('shops','posts.shop_id','=','shops.id');
            

        //$keyword　が空ではない場合、検索処理を実行します
        if (!empty($keyword)) {
            $posts->where(function ($posts) use ($keyword) {
                $posts->where('posts.title', 'like' , "%{$keyword}%")
                    ->orWhere('posts.comment', 'like', "%{$keyword}%")
                    ->orWhere('shops.adress', 'like', "%{$keyword}%");
            });
        }  
       
        if (isset($review)) {
            $posts->where('review', $review);
        }
       //DD($posts);
       //$posts=$posts->orderBy('created_at', 'desc')->get();
        $posts=Post::orderBy('created_at', 'desc')->get()->toArray();
        //$pusts=Post::latest('updated_at')->get()->toArray();
        //$posts=$posts->get()->toArray();
        //$posts = Post::all();
       //DD($posts);
        
        return view('home',[
            'posts'=>$posts,
            'keyword'=>$keyword,
            'review'=>$review,
        ]);
    }

    //投稿詳細
    public function postDetail(post $post){
        return view('post',[
            'posts'=>$post,
            
        ]);
       
    }
    //店舗情報一覧
    public function shopInformation(shop $shop){
        $shop = Shop::all();

        // ユーザーごとにグループ化して平均値を計算
        // $post = DB::table('posts')
        //         ->avg('review');
       //https://teratail.com/questions/3052
        
        return view('shop_information',[
            'shops'=>$shop,
            //'post'=>$post,
        ]);
       
    }

    //自分の投稿一覧
    public function myPost(post $post){
       
        $posts=Post::orderBy('created_at', 'desc')->where('user_id',Auth::id())->get();
       

        return view('my_post',[
            'posts'=>$posts,
        ]);
    }

   

   
}
