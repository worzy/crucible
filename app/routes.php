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

Route::get('/', array('as' => 'home', 'uses' => 'PostController@index'));
Route::get('login', array('as' => 'user.login', 'uses' => 'UserController@getLogin'));
Route::post('login', array('uses' => 'UserController@postLogin'));
Route::get('register', array('as' => 'user.register', 'uses' => 'UserController@getRegister'));
Route::post('register', array('uses' => 'UserController@postRegister'));
Route::get('logout', array('as' => 'user.logout', 'uses' => 'UserController@getLogout'));
Route::resource('post', 'PostController');
