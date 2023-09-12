<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

 use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    //use Notifiable;
    use SoftDeletes;

    protected $fullable=['title','review','comment','image','shop_id'];

    public function shop(){
        return $this->belongsTo('App\Shop');
    }

    public function comment(){
        return $this->belongsTo('App\Comment','id');
    }

    public function bookmark()
    {
        return $this->hasMany('App\Bookmark');
    }
    //後でViewで使う、いいねされているかを判定するメソッド。
    public function isLikedBy($user): bool {
        return Bookmark::where('user_id', $user->id)->where('shop_id', $this->id)->where('post_id', $this->id)->first() !==null;
    }

    // protected $with = ['shops'];

    // protected $appends = ['avg_score'];

    // public function getAvgStarAttribute()
    // {
    //     return $this->attributes['avg_score'] = $this->posts->avg('review');
    // }
}
