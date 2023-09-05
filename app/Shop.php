<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

    public function post(){
        return $this->hasMany('App\Post');
    }

    public function bookmark(){
        return $this->belongsTo('App\Bookmark','id');
    }

    //後でViewで使う、いいねされているかを判定するメソッド。
    public function isLikedBy($user): bool {
        return Bookmark::where('user_id', $user->id)->where('shop_id', $this->id)->where('post_id', $this->id)->first() !==null;
    }
}
