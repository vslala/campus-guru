<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ["uses"=>'WelcomeController@index',
    "as"=>"index"
]);

Route::get('/home', ["uses"=>'HomeController@index', "as"=>"home"]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::put('/register', [
   'uses'=>"WelcomeController@register",
    "as"=>"register"
]);

Route::put('/login', [
    'uses'=>"WelcomeController@login",
    "as"=>"login"
]);

Route::get('/auth/logout', [
    'uses'=>"WelcomeController@logout",
    "as"=>"logout"
]);

Route::get('/user/profile', [
    'uses'=>"HomeController@profile",
    "as"=>"profile"
]);

Route::get('/user/home', [
    'uses'=>"HomeController@home",
    "as"=>"userHome"
]);

Route::put('/user/upload/dp', [
    'uses'=>"HomeController@uploadDP",
    "as"=>"uploadPicture"
]);

Route::put('/user/status/update', [
    'uses'=>"HomeController@statusUpdate",
    "as"=>"statusUpdate"
]);

Route::put('/user/profile/edit', [
    'uses'=>"HomeController@editProfile",
    "as"=>"editProfile"
]);

Route::get('/user/profile/visit/{username}', [
    'uses'=>"HomeController@profileVisit",
    "as"=>"profileVisit"
]);
Route::get('/user/compose/blog', [
    'uses'=>"HomeController@composeBlog",
    "as"=>"composeBlog"
]);
Route::get('/user/blog', [
    'uses'=>"HomeController@blog",
    "as"=>"blog"
]);
Route::put('/user/create/blog', [
    'uses'=>"HomeController@createBlog",
    "as"=>"createBlog"
]);
Route::get('/user/edit/blog/{id}', [
    'uses'=>"HomeController@blogEdit",
    "as"=>"blogEdit"
]);
Route::put('/user/update/blog/{id}', [
    'uses'=>"HomeController@blogUpdate",
    "as"=>"blogUpdate"
]);
Route::get('/user/delete/blog/{id}', [
    'uses'=>"HomeController@blogDelete",
    "as"=>"blogDelete"
]);

/*
 * DiscussionController starts here
 */
Route::get('/user/start/discussion', [
    'uses'=>"DiscussionController@index",
    "as"=>"startDiscussion"
]);
Route::put('/user/start/discussion', [
    'uses'=>"DiscussionController@create",
    "as"=>"createDiscussion"
]);

/*
 * Question Controller Starts here
 */
Route::get('/user/ask/question', [
    'uses'=>"QuestionController@index",
    "as"=>"askQuestion"
]);

Route::put('/user/ask/question', [
    'uses'=>"QuestionController@create",
    "as"=>"createQuestion"
]);
Route::get('/user/show/question', [
    'uses'=>"QuestionController@showQuestionsByUsername",
    "as"=>"userQuestions"
]);
Route::get('/user/show/question/{id}', [
    'uses'=>"QuestionController@show",
    "as"=>"show"
]);