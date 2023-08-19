<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Shop;

use App\User;

use App\Post;

use App\Comment;

use App\Bookmark;

use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    public function index(Request $request){
        $user_id = Auth::id();

        $posts=Post::query()->latest()->get();
        //$q=Post::query()->where('')->where('user_id',Auth::id());

        //検索
        $keyword = $request->input('keyword');
        $review_id=$request->input('review_id');

   

        //$keyword　が空ではない場合、検索処理を実行します
        if (!empty($keyword)) {
            $request->where(function ($request) use ($keyword) {
                $request->where('title', 'like', '%' , "%{$keyword}%")
                    ->orWhere('comment', 'like', '%', "%{$keyword}%")
                    ->orWhere('adress', 'like', '%' , "%{$keyword}%");
            });
        }  

        if (isset($review_id)) {
            $request->where('review_id', $review_id);
        }

    
        //->paginate(8); 8投稿毎にページ移動
       

        return view('home',[
            'posts'=>$posts,
            'keyword'=>$keyword,
            'review_id'=>$review_id,
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
        return view('shop_information',[
            'shops'=>$shop,
        ]);
       
    }

    //自分の投稿一覧
    public function myPost(post $post){
       
        $posts=Post::orderBy('created_at', 'desc')->get();
       

        return view('my_post',[
            'posts'=>$posts,
        ]);
    }

   

   
}
