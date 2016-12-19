<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        return view('admin.pages.dashboard');
    }

    public function redirectLogin(){
        return view('admin.login');
    }

    public function login(Request $request){
        $remember=(bool)$request->has('remember');

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password, 'auth_type'=>$request->auth_type, 'user_status'=>'enabled'],$remember)){
            return redirect()->intended('admin');
        }else{
            return redirect()->back()->with('error','Error Login!! Invalid Credentials');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
