<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Shop;

use App\Post;

use App\Comment;

use App\Bookmark;

//use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    public function index(){
        $post=new post;
        $posts=$post->all()->toArray();
        
        $shop=new shop;
        $shops=$shop->all()->toArray();

        return view('home',[
            'posts'=>$posts,
            'shops'=>$shops,
        ]);
    }

    //投稿詳細
    public function postDetail(post $post){
        return view('post',[
            'posts'=>$post,
        ]);
       
    }

    //店舗詳細
    public function shopDetail(shop $shop){
        return view('shop',[
            'shops'=>$shop,
        ]);
       
    }
}
