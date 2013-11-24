<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

View::name('layouts.master', 'layout');
$layout = View::of('layout');

Route::get('/', array('as' => 'home', 'uses' => 'PostController@index'));
Route::get('login', array('as' => 'user.login', 'uses' => 'UserController@getLogin'));
Route::post('login', array('uses' => 'UserController@postLogin'));
Route::get('register', array('as' => 'user.register', 'uses' => 'UserController@getRegister'));
Route::post('register', array('uses' => 'UserController@postRegister'));
Route::get('logout', array('as' => 'user.logout', 'uses' => 'UserController@getLogout'));

Route::get('tags/{title}', array('as' => 'posts.tags', 'uses' => 'PostController@tags'));

Route::resource('post', 'PostController');
Route::resource('comment', 'CommentController');

Route::get('roadmap', function() use ($layout)
{
    return $layout->nest('content', 'roadmap');
});

Route::get('bookmarklet', function() use ($layout)
{
    return $layout->nest('content', 'bookmarklet');
});