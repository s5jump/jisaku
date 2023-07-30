<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function bookmark(){
        return $this->belongsTo('App\Bookmark','id');
    }
}
