<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        //1->admin , 0->user
        if(Auth::check() && Auth::user()->isAdmin == 1){
            return $next($request);
        }else{
            return redirect('/homePage');
        }
        
    }
}
