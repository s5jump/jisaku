<?php

namespace App;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo('App\Models\User');
    }
    
    public function post(){
        return $this->hasMany('App\Post');
    }

    public function bookmarks(){
        return $this->hasMany('App\Bookmark');
    }

    public function shopavg($shop_id){

        return Post::select('shop_id',DB::raw('AVG(review) as count_review'))
                ->groupBy('shop_id')
                ->where('shop_id','=',$shop_id)
                ->first();
        //dd($post);
        

        
    }
}
