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

        //検索
        $title = $request->input('title');

        $query = Post::query();

        if(!empty($title)) {
            $query->where('title', 'LIKE', "%{$title}%")
                ->orWhere('author', 'LIKE', "%{$title}%");
        }

       


        $post=new post;
        $posts=$post->latest()->get();
     
        // $user = User::query()->where('del_flg',0)->get();

        return view('home',[
            'posts'=>$posts,
            //'title'=>$title,
            //'auther'=>$auther,
            'title'=>$title,
            //'users'=>$user,
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
        return view('shop_information',[
            'shops'=>$shop,
        ]);
       
    }

    //自分の投稿一覧
    public function myPost(post $post){
        $post=new post;
        $posts=$post->latest()->where('user_id',Auth::id())->get();

        return view('my_post',[
            'posts'=>$posts,
        ]);
    }

   

   
}
