<?php

class PostController extends BaseController {


	public function __construct(Post $post)
    {
        parent::__construct();

        $this->post = $post;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = $this->post->with('user')->orderBy('created_at', 'desc')->get();
		$gravatar = App::make('simplegravatar');

		foreach($posts as $post)
		{
			$post->user = $post;
			$url = parse_url($post->url);
			$post->domain = $url['host'];
			$post->gravatar = $gravatar->getGravatar($post->User->email);
		}

		$this->layout->content = View::make('post.index', array('posts' => $posts));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('post.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user 			= Sentry::getUser();

		$post 			= new Post;
		$post->title 	= Input::get('title');
		$post->url 	 	= Input::get('url');
		$post->user_id	= $user->id;


		if(!$post->validate()){

			return Redirect::to('post/create')->withErrors($post->v);
			
		}

		$post->save();

		return Redirect::route('home');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = $this->post->find($id);

		$this->layout->content = View::make('post.show', array('post' => $post));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}