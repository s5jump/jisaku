<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fullable=['title','review','comment','image'];

    public function shop(){
        return $this->belongsTo('App\Shop','shop_id','id');
    }

    public function comment(){
        return $this->belongsTo('App\Comment','id');
    }
}
