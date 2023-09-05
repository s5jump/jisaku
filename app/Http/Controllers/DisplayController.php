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
       // $user_id = Auth::id();
        //検索 
        $keyword = $request->input('keyword');
        $review=$request->input('review');

        $posts=Post::query();
        //DD($posts);
        //join https://qiita.com/kamome_susume/items/b37709e1ba29abacdbd9
        //$posts=Post::join('shops','posts.shop_id','=','shops.id');
            

        //$keyword　が空ではない場合、検索処理を実行します
        if (!empty($keyword)) {
            $posts=$posts->whereHas('shop',function ($q) use ($keyword) {
                $q->where('adress', 'like', "%{$keyword}%");
            })->orWhere('title', 'like' , "%{$keyword}%")
                ->orWhere('comment', 'like', "%{$keyword}%");
                 
            
        }  
       
        if (isset($review)) {
            $posts=$posts->where('review', $review);
        }
       
       $posts=$posts->orderBy('created_at', 'desc')->get()->toArray();
       
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
    public function shopInformation(Shop $shop,Post $post){
        $shop = Shop::all();

        // $posts=Post::join('shops','posts.shop_id','=','shops.id');
        // // ユーザーごとにグループ化して平均値を計算
        // $posts = DB::table('posts')
        //         ->avg('review');
                
                //Work::get()->avg('progress');

        
        return view('shop_information',[
            'shops'=>$shop,
            //'posts'=>$posts,
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
