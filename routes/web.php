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

// HOMEPAGE AND SEARCH
Route::get('/', 'QuestionAndEtcController@index');
Route::get('/homePage', 'QuestionAndEtcController@showAndSearchDataQuestionForHomepage');

// LOGIN AND REGISTER
Route::get('/register', 'RegisterController@registerPage')->middleware('guest');
Route::post('/registers', 'RegisterController@register')->middleware('guest');
Route::get('/login', 'LoginController@loginPage')->middleware('guest');
Route::post('/login', 'LoginController@login')->middleware('guest');

// LOGOUT
Route::get('/logout', 'LogoutController@logout')->middleware('loggedIn');

// ADD QUESTION AND SHOW
Route::get('/homePage/addQuestion', 'QuestionAndEtcController@addQuestionPage')->middleware('loggedIn');
Route::get('/homePage/addQuestion', 'TopicController@showTopic')->middleware('loggedIn');
Route::post('/homePage', 'QuestionAndEtcController@addQuestion')->middleware('loggedIn');

// ANSWER
Route::get('/homePage/answer/{id}', 'AnswerController@showQuestion');
Route::post('/homePage/answer/{id}', 'AnswerController@answer')->middleware('loggedIn');
Route::delete('/homePage/answer/{id}', 'AnswerController@deleteAnswer')->middleware('loggedIn');
Route::get('/homePage/status/{id}', 'AnswerController@closedQuestion')->middleware('loggedIn');
Route::get('/homePage/answer/{id}/editAnswerPage', 'AnswerController@showEditAnswerPage')->middleware('loggedIn');
Route::put('/homePage/answer/{id}', 'AnswerController@updateAnswer')->middleware('loggedIn');

// PROFILE AND SEND MESSAGE
Route::get('/homePage/profile/{id}', 'ProfileUserController@showProfileUser')->middleware('loggedIn');
Route::get('/homePage/profile/{id}/editProfilePage', 'ProfileUserController@editProfilePage')->middleware('loggedIn');
Route::post('/homePage/profile/edit/{id}', 'ProfileUserController@updateProfile')->middleware('loggedIn');
Route::post('/homePage/profile/{id}', 'ProfileUserController@sendMessage')->middleware('loggedIn');

// INBOX
Route::get('/homePage/inbox', 'ProfileUserController@showMessageInInbox')->middleware('loggedIn');
Route::delete('/homePage/inbox/{id}', 'ProfileUserController@deleteMessage')->middleware('loggedIn');

// MY QUESTION
Route::get('/homePage/myQuestion', 'MyQuestionController@showMyQuestion')->middleware('loggedIn');
Route::get('/homePage/myQuestion/{id}', 'MyQuestionController@seeAnswer')->middleware('loggedIn');
Route::get('/homePage/myQuestion/status/{id}', 'MyQuestionController@closedQuestion')->middleware('loggedIn');
Route::get('/homePage/myQuestion/{id}/editQuestionPage', 'MyQuestionController@editQuestionPage')->middleware('loggedIn');
Route::put('/homePage/myQuestion/{id}', 'MyQuestionController@editQuestion')->middleware('loggedIn');
Route::delete('/homePage/myQuestion/{id}', 'MyQuestionController@deleteQuestion')->middleware('loggedIn');

// MANAGE USER
Route::get('/homePage/manageUser', 'ManageUserController@showUser')->middleware('admin');
Route::get('/homePage/manageUser/insertUserPage', 'ManageUserController@insertUserPage')->middleware('admin');
Route::post('/homePage/manageUser', 'ManageUserController@addNewUser')->middleware('admin');
Route::delete('/homePage/manageUser/{id}', 'ManageUserController@deleteUser')->middleware('admin');
Route::get('/homePage/manageUser/{id}/edit', 'ManageUserController@edit')->middleware('admin');
Route::put('/homePage/manageUser/{id}', 'ManageUserController@update')->middleware('admin');

// MANAGE QUESTION
Route::get('/homePage/manageQuestion', 'manageQuestionController@showQuestion')->middleware('admin');
Route::get('/homePage/manageQuestion/insertQuestionPage', 'manageQuestionController@showAddQuestionPage')->middleware('admin');
Route::get('/homePage/manageQuestion/insertQuestionPage', 'manageQuestionController@showTopic')->middleware('admin');
Route::post('/homePage/manageQuestion', 'manageQuestionController@addQuestion')->middleware('admin');
Route::get('/homePage/manageQuestion/{id}', 'manageQuestionController@closedQuestion')->middleware('admin');
Route::delete('/homePage/manageQuestion/{id}', 'manageQuestionController@deleteQuestion')->middleware('admin');
Route::get('/homePage/manageQuestion/{id}/edit', 'manageQuestionController@editQuestionPage')->middleware('admin');
Route::put('/homePage/manageQuestion/{id}', 'manageQuestionController@updateQuestion')->middleware('admin');

// MANAGE TOPIC
Route::get('/homePage/manageTopic/', 'ManageTopicController@showTopic')->middleware('admin');
Route::get('/homePage/manageTopic/addTopicPage', 'ManageTopicController@addTopicPage')->middleware('admin');
Route::post('/homePage/manageTopic', 'ManageTopicController@addTopic')->middleware('admin');
Route::delete('/homePage/manageTopic/{id}', 'ManageTopicController@deleteTopic')->middleware('admin');
Route::get('/homePage/manageTopic/{id}/editTopicPage', 'ManageTopicController@editTopicPage')->middleware('admin');
Route::put('/homePage/manageTopic/{id}', 'ManageTopicController@updateTopic')->middleware('admin');

Auth::routes();
