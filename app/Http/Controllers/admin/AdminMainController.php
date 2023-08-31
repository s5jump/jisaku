<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    function show(){
        return view("admin.toppage");
      }

    
}

//管理者ページ
//https://onityanzyuku.com/laravel-manage/
//https://qiita.com/hitotch/items/45c70110291f725d87c4
