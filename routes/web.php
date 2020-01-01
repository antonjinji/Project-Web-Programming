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




Route::get('/homePage', function () {
    return view('homePage');
});

// Route::get(['middleware' => 'web'], function(){
//     Route::get(['middleware' => 'guest'], function(){
        Route::get('/register', 'RegisterController@registerPage');
        Route::post('/register', 'RegisterController@register');
        Route::get('/login', 'LoginController@loginPage');
        Route::post('/login', 'LoginController@login');
//     });
        Route::get('/logout', 'LogoutController@logout');
// });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

