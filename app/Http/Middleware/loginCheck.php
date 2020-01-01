<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class loginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //disini saya mengecek apakah dia status nya apa sekarang, kalau dia sebagai user atau admin, baru bisa next, kalau gk saya arahin dia ke halaman register.
        //jadi dia tidak boleh sembarang langsung masuk ke page page tertentu.
        if(Auth::check()){
            return $next($request);
        }else{
            return redirect('/register');
        }
    }
}
