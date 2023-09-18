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
       // $role = Auth::user()->role;

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
            //'role'=>$role,
        ]);
    }
    

    //投稿詳細
    public function postDetail(Post $post){
     
        return view('post',[
            'posts'=>$post,
            
            
        ]);
       
    }
    //店舗情報一覧
    public function shopInformation(Shop $shop,Post $post){
        $shop = Shop::all();

        //http://ja.uwenku.com/question/p-nubjsceu-hg.html#:~:text=%27where%27%E3%82%92%E4%BD%BF%E7%94%A8%E3%81%97%E3%81%A6%E5%B9%B3%E5%9D%87%E5%80%A4%E3%82%92%E7%B0%A1%E5%8D%98%E3%81%AB%E5%8F%96%E5%BE%97%E3%81%A7%E3%81%8D%E3%81%BE%E3%81%99%E3%80%82%20Laravel%E3%81%A7%E5%B9%B3%E5%9D%87%E5%80%A4%E3%82%92%E5%8F%96%E5%BE%97%E3%81%99%E3%82%8B%E6%96%B9%E6%B3%95%20%24rate%20%3D%20DB%3A%3Atable,%28%27reviews%27%29%20-%3Ewhere%20%28%27p_id%27%2C%202%29%20-%3Eavg%20%28%27rate%27%29%3B
        //$posts=Post::join('shops','posts.shop_id','=','shops.id');
     
        // $posts = \DB::table('posts') 
        //     ->groupBy('shop_id') 
        //     ->selectRaw('avg(review)') 
        //     ->get(); 
        $posts = \DB::table('posts') 
            ->groupBy('shop_id') 
            ->avg('review');
            

        //  $posts = \DB::table('posts') 
        //     ->groupBy('shop_id') 
        //     ->selectRaw('shop_id, avg(review)') 
        //     ->get(); 

        
        
        
        return view('shop_information',[
            'shops'=>$shop,
            'posts'=>$posts,
            
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
