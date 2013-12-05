@section('content') 
@if(!empty($tag_title))
<h3 class="filter">Filtering by:</h3> <p class="filter-tag"><a href="/">&times;</a>{{$tag_title}}</p>
@endif
@foreach ($posts as $row)
<div class="fade">
	<div class="post col8 alpha omega">
		<div class="left">
			<img class="image" src="{{ $row->gravatar }}">
		</div>
		<div class="right">
		    <a target="_blank" href="{{ $row->url }}"><h2>{{ $row->title }}</h2></a>
		    <span class="domain"><a target="_blank" href="{{ $row->url }}">({{ $row->domain }})</a></span> 
		       <span class="sub-text">Posted by {{ $row->User->first_name }} {{ substr ( $row->User->last_name , 0, 1 ) }} {{ $row->timeSince() }} - </span> <span class="comments"> {{HTML::linkRoute('post.show', count($row->comments).' comments', array($row->id))}}</span>
		       <br>
		       <p class="tags">@foreach($row->tags as $tag)
		       <a href="{{URL::route('posts.tags', array($tag->name))}}" class="tag">{{$tag->name}}</a>
		       @endforeach</p>
		</div>
	</div>
</div>
<div class="clear"></div>
@endforeach
<?php echo $posts->links(); ?>
@stop