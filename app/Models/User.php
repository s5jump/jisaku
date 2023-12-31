<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;//論理削除

    protected $table = 'users';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'image','role','deleted_at','reset_password_access_key',
        'reset_password_expire_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function shop(){
        return $this->hasMany('App\Shop');
    }

    public function post(){
        return $this->hasMany('App\Post');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }

    public function bookmark(){
        return $this->hasMany('App\Bookmark');
    }

    protected $dates = ['deleted_at'];
}
