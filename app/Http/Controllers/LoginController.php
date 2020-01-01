<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function LoginPage(){
        return view('auth.login');
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;

        $user = DB::table('users')->where('email', $email)->first();

        if($user){
            if(Hash::check($password, $user->password)){
                Session::put('profile_picture', $user->profile_picture);
                Session::put('name', $user->name);
                Session::put('topic', $user->nameTopic);
                Session::put('question', $user->question);
                Session::put('answer', $user->answer);

                if($remember == true){
                    Cookie::queue(Cookie::make('email', $email, 60));
                    Cookie::queue(Cookie::make('password', $password, 60));

                    return redirect('/homePage')->with('alert-success', 'Success Login');
                }else{
                    return redirect('/homePage')->with('alert-success', 'Success Login');
                }
            }else{
                return redirect('/login')->with('alert-fail', 'Wrong password or email!');
            }
        }else{
            return redirect('/login')->with('alert-fail', 'Wrong password or email!');
        }
    }
}
