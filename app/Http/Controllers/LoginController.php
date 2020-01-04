<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function LoginPage(){
        return view('auth.login');
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;

        // $user = DB::table('users')->where('email', $email)->first();
        if(Auth::attempt([
            'email' => $email,
            'password' => $password])){

            if($remember){
                // Cookie::make('email', $email, 60);
                // Cookie::make('password', $password, 60);

                return redirect('/homePage')->with('success', 'Success Login')->withCookie(cookie('cookie', $email, 30));
            }else{
                return redirect('/homePage')->with('success', 'Success Login');
            }
        }else{
            return redirect('/login')->with('fail', 'Wrong password or email!');
        }
    }
}
