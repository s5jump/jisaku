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
    public function index(Request $request){
        $post=new post;
        $posts=$post->latest()->get();

        // if($select == 'asc'){
        //     return $this->orderBy('created_at', 'asc')->get();
        // } elseif($select == 'desc') {
        //     return $this->orderBy('created_at', 'desc')->get();
        // } else {
        //     return $this->all();
        // }
        
     

        return view('home',[
            'posts'=>$posts,
            //'shops'=>$shops,
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

   

   
}
