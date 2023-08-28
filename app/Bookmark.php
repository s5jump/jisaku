<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo(User::class);
    }

    public function post()
    {  
        return $this->belongsTo(Post::class);
    }

    public function shop()
    {  
        return $this->belongsTo(Shop::class);
    }

  
}
