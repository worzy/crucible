<?php

class PostController extends BaseController {


	public function __construct(Post $post, Tag $tag)
    {
        parent::__construct();

        $this->beforeFilter('auth', array('only' => array('create', 'store', )));

        $this->post = $post;
        $this->tag = $tag;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = $this->post->with(array('user','tags'))
		 					->orderBy('created_at', 'desc')
		 					->paginate(15);

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
	 * Display a listing of the resource by tag.
	 *
	 * @return Response
	 */
	public function tags($tag_title)
	{
		$tag = $this->tag->where('name', '=', $tag_title)->first();

		$posts = $tag->posts()->with(array('user','tags'))
		 					->orderBy('created_at', 'desc')
		 					->paginate(10);

		$gravatar = App::make('simplegravatar');

		foreach($posts as $post)
		{
			$post->user = $post;
			$url = parse_url($post->url);
			$post->domain = $url['host'];
			$post->gravatar = $gravatar->getGravatar($post->User->email);
		}

		$this->layout->content = View::make('post.index', array('posts' => $posts, 'tag_title' => $tag_title));
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

		$tags = Input::get('tags');

		$tags_array = explode(",", $tags);

		if(!$post->validate()){

			return Redirect::to('post/create')->withErrors($post->v);
			
		}

		$post->save();

		foreach($tags_array as $row)
		{
			$tag_str = trim($row);
			$tag = $this->tag->where('name', '=', $tag_str)->first();

			if(!$tag)
			{
				$tag = new Tag();
				$tag->name = $tag_str;
				$tag->save();
			}

			$post->tags()->attach($tag->id);
		}

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
		$gravatar = App::make('simplegravatar');

		$post = $this->post->with(array('comments', 'comments.user'))->find($id);

		$post->gravatar = $gravatar->getGravatar($post->User->email);

		$url = parse_url($post->url);
		$post->domain = $url['host'];

		foreach($post->comments as $k => $comment)
		{
			$comment->gravatar = $gravatar->getGravatar($comment->user->email);
		}

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