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
Route::get('/homePage', 'QuestionAndEtcController@index');
Route::get('/homePage', 'QuestionAndEtcController@showAndSearchDataQuestionForHomepage');

// Route::group(['middleware' => ['web']], function () {
    // Route::group(['middleware' => ['guest']], function () {
        Route::get('/register', 'RegisterController@registerPage');
        Route::post('/registers', 'RegisterController@register');
        Route::get('/login', 'LoginController@loginPage');
        Route::post('/login', 'LoginController@login');
    // });

    Route::get('/logout', 'LogoutController@logout')->middleware('loggedIn');

    Route::get('/homePage/addQuestion', 'QuestionAndEtcController@addQuestionPage');
    Route::get('/homePage/addQuestion', 'TopicController@showTopic');
    Route::post('/homePage', 'QuestionAndEtcController@addQuestion');
    
    //MANAGE USER
    Route::get('/homePage/manageUser', 'ManageUserController@showUser');
    Route::get('/homePage/manageUser/insertUserPage', 'ManageUserController@insertUserPage');
    Route::post('/homePage/manageUser', 'ManageUserController@addNewUser');
    Route::delete('/homePage/manageUser/{id}', 'ManageUserController@deleteUser');
    Route::get('/homePage/manageUser/{id}/edit', 'ManageUserController@edit');
    Route::put('/homePage/manageUser/{id}', 'ManageUserController@update');

    //MANAGE TOPIC


// });

Auth::routes();
