<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

 use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    //use Notifiable;
    

    protected $fullable=['title','review','comment','image','shop_id'];

    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo('App\Models\User');
    }

    public function shop(){
        return $this->belongsTo('App\Shop');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }

    public function bookmark()
    {
        return $this->hasMany('App\Bookmark');
    }
    

    // protected $with = ['shops'];

    // protected $appends = ['avg_score'];

    // public function getAvgStarAttribute()
    // {
    //     return $this->attributes['avg_score'] = $this->posts->avg('review');
    // }
}
