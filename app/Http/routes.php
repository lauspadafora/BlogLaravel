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

//Authentication
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/', function () {
     return view('home');
});

Route::get('/home', function () {
    return redirect('posts/index');
});

Route::get('/index', function () {
    return view('index');
});

//Posts
Route::get('posts/index','PostController@index');
Route::get('posts/create','PostController@create');
Route::post('posts/store','PostController@store');
Route::get('posts/show/{slug}',['as' => 'post', 'uses' => 'PostController@show'])->where('slug', '[A-Za-z0-9-_]+');
Route::get('posts/edit/{slug}','PostController@edit');
Route::post('posts/update','PostController@update');
Route::get('users/getLocations','UserController@getLocations');
Route::get('posts/destroy/{id}','PostController@destroy');

//Comments
Route::post('comments/store','CommentController@store');
Route::get('comments/destroy/{id}','CommentController@destroy');

//Users
Route::get('users/profile','UserController@profile');