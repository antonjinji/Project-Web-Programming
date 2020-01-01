<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/homePage', 'HomeController@index');

// Route::get('/home', function (){
//     return view('homePage');
// });
Route::get('/homePage', 'HomeController@index');
Route::get('/homePage', 'QuestionAndEtcController@index');

// Route::get(['middleware' => 'web'], function(){
//     Route::get(['middleware' => 'guest'], function(){
        Route::get('/register', 'RegisterController@registerPage');
        Route::post('/register', 'RegisterController@register');
        Route::get('/login', function(){
            return view('auth.login');
        });
//        Route::get('/login', 'LoginController@loginPage');
        Route::post('/login', 'LoginController@login');
//     });
        Route::get('/logout', 'LogoutController@logout');
// });


Auth::routes();


