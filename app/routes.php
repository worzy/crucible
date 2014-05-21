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

Route::get('view/{post_id}', array('as' => 'post.view', 'uses' => 'ClickController@show'));

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

Route::get('/rss', function()
{
    $feed = Rss::feed('2.0', 'UTF-8');
    $feed->channel(array('title' => 'Crucible Feed', 'description' => 'Simple web app for saving sharing links within your organisation powered by Laravel', 'link' => URL::to('/')));
    
    $posts = Post::with(array('user','tags'))
		 		 ->orderBy('created_at', 'desc')
		 		 ->take(20)
		 		 ->get();

	foreach($posts as $post)
	{
        $feed->item(array('title' => $post->title, 'description|cdata' => '<a href="'.URL::route('post.show', array($post->id)).'">Comments</a>', 'link' => $post->url));
    }

    return Response::make($feed, 200, array('Content-Type' => 'text/xml'));
});