<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo('App\Models\User');
    }
    public function post()
    {  
        return $this->belongsTo('App\Post');
       
    }
}
