<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


    public function login_view(){
        return view('auth.login');
    }


    public function login(Request $request){
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->except(['_token']))) {
            return  redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Invalid Combination');
        }
    }



   public function logout(){
    Auth::logout();
    return redirect()->route('login')->with('success' , 'Seccesfully Logout');
   }

}
