<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    function showForm(){
        return view('admin.login');
    }

    function login(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $image = $request->input('image');
        

        if($name == 'xs35gsh6' && $password == 'gcg408gbnx'){
            $request->session()->put("auth_admin", true);
            return redirect('admin');
        }

        return view('admin.toppage');
    }
}
