@section('content') 
<div class="post col8 alpha omega">
		<div class="left">
			<img class="image" src="{{ $post->gravatar }}">
		</div>
		<div class="right">
		    <a target="_blank" href="{{ URL::route('post.view', $post->id) }}"><h1>{{ $post->title }}</h1></a>
		    <p><span class="domain"><a target="_blank" href="{{ URL::route('post.view', $post->id) }}">({{ $post->domain }})</a></span> 
		       <span class="sub-text">Posted by {{ $post->User->first_name }} {{ substr ( $post->User->last_name , 0, 1 ) }} {{ $post->timeSince() }}</span> - Number of clicks {{ $click_count }}
		       <br>
		       <p class="tags">@foreach($post->tags as $tag)
		       <a href="{{URL::route('posts.tags', array($tag->name))}}" class="tag">{{$tag->name}}</a>
		       @endforeach</p>
		    </p>
		</div>

<div class="clear"></div>

		<h3>Comments</h3>
		@foreach($post->comments as $row)
		<div class="comment">
		<div class="left">
			<img class="image" src="{{ $row->gravatar }}">
		</div>
		<div class="right">
		<h4>{{ $row->User->first_name }} {{ substr ( $row->User->last_name , 0, 1 ) }}</h4>
		<p>{{nl2br ($row->content)}}</p>
		<p class="time">{{ $row->timeSince() }}</p>
		</div>
		</div>
		<div class="clear"></div>
		@endforeach

		
		{{ Form::open(array('url' => 'comment')) }}
		<div class="add">
		@foreach ($errors->all() as $error)
    		<p><span class="error">&times;</span> {{ $error }}</p>
		@endforeach
		<input type="hidden" name="post_id" value="{{$post->id}}">
		<textarea name="content" placeholder="Standard text or HTML is all good here"></textarea>
		<input class="btn" type="submit" value="Add a comment">
		</div>
		{{ Form::close() }}
	  	

</div>
<div class="clear"></div>

@stop