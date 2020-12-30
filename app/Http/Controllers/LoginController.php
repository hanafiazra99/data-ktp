<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function aksilogin(Request $request){
        $this->validate($request,['email'=>'required','password'=>'required']);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('ktp.index');
        }else{
            return redirect()->route('login');
        }
    }
    public function aksiregister(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
            'confirm_password'=>'required|same:password'
        ]);
        User::create(['email'=>$request->email,'password'=>bcrypt($request->password),'role'=>'user']);
        return redirect()->route('login');
    }
    public function register(){
        return view('auth.register');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
