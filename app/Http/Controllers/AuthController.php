<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
    	return view('auths.login');
        // if (Auth::attempt($request->only('username','password'))){
        //     return redirect('/dashboard');
        // }else{
        //     return redirect('/login')->with('fail','Email atau Password yang anda masukkan salah...');
        // }
    }
    public function postlogin(Request $request)
    {
    	if (Auth::attempt($request->only('username','password'))){
    		return redirect('/dashboard');
    	}else{
    		return redirect('/login')->with('fail','Username atau Password yang anda masukkan salah...');
    	}
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/');
    }
}
