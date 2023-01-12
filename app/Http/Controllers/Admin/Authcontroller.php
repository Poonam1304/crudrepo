<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Authcontroller extends Controller
{
    public function getLogin(){
     return view('Admin.login');
    }
    public function postLogin(request $request){
     $request->validate(['email'=>'required|email',

'password'=>'required'
]);
 $validated=auth()->attempt([
    'email'=>$request->email,
    'password'=>$request->password,
    'is_admin'=>1
]);
if($validated){

    return redirect()->route('dashboard')->with('success','login sucessfully');
}else{
    return redirect()->back()->with('error','Invalid Credentials');
}

    }
    public function dashboard(){
        $data=['title'=>'Dashboard'];
        return view('Admin.dashboard',$data);
    }
    public function userlist(){
     return view('Admin.userslist');
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('Admin')->with('sucess','You have logout sucessfully');
    }


    
}

