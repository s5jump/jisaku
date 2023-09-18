<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

    public function post(){
        return $this->hasMany('App\Post');
    }

    public function bookmarks(){
        return $this->hasMany('App\Bookmark');
    }

}
