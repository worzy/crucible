@section('content') 
<div class="post col8 alpha omega">
		<div class="left">
			<img class="image" src="{{ $post->gravatar }}">
		</div>
		<div class="right">
		    <a target="_blank" href="{{ $post->url }}"><h1>{{ $post->title }}</h1></a>
		    <p><span class="domain"><a target="_blank" href="{{ $post->url }}">({{ $post->domain }})</a></span> 
		       <span class="sub-text">Posted by {{ $post->User->first_name }} {{ substr ( $post->User->last_name , 0, 1 ) }} {{ $post->timeSince() }}</span> 
		       <br>
		       <p class="tags">@foreach($post->tags as $tag)
		       <a class="tag">{{$tag->name}}</a>
		       @endforeach</p>
		    </p>
		</div>
	</div>
	<div class="clear"></div>
<h3>Comments</h3>
@foreach($post->comments as $row)
<div class="left">
	<img class="image" src="{{ $post->gravatar }}">
</div>
<h4>{{ $post->User->first_name }} {{ substr ( $post->User->last_name , 0, 1 ) }}</h4>
<p>{{$row->content}}</p>
<p>{{ $row->timeSince() }}</p>
@endforeach

{{ Form::open(array('url' => 'comment')) }}
@foreach ($errors->all() as $error)
    <p><span class="error">&times;</span> {{ $error }}</p>
@endforeach
<input type="hidden" name="post_id" value="{{$post->id}}">
<textarea name="content"></textarea>
<input class="btn" type="submit" value="Add a comment">
{{ Form::close() }}

@stop