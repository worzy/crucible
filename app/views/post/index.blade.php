@section('content')
@foreach ($posts as $row)
	<div class="post col8 alpha omega">
		<div class="left">
			<img class="image" src="{{ $row->gravatar }}">
		</div>
		<div class="right">
		    <a target="_blank" href="{{ $row->url }}"><h2>{{ $row->title }}</h2></a>
		    <p><span class="domain">(<a target="_blank" href="{{ $row->url }}">{{ $row->domain }}</a>)</span> 
		       <span class="sub-text">Posted by {{ $row->User->first_name }} {{ substr ( $row->User->last_name , 0, 1 ) }} {{ $row->timeSince() }}<?php /* | 3 comments*/?></span>
		       <span class="tags">
		       @foreach($row->tags as $tag)
		       #{{$tag->name}}
		       @endforeach
		       </span>
		    </p>
		</div>
	</div>
	<div class="clear"></div>
@endforeach
@stop