<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class logincontroller extends Controller
{
    public function index()
    {
        return view('admin.users.login',[
            'title' => 'đăng nhập hệ thống'
        ]);
    }

    public function store(Request $request)
    {

        $this -> validate($request,[
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if(Auth::attempt([
            'email' => $request -> input('email'),
            'password' => $request ->input('password')
    ],  $request -> input('remember'))){
        return redirect() ->route('admin');
    }

    
    Session::flash('error','email hoặc password không chính xác');
    return redirect() -> back();
    }

}
