@section('content') 
<h1>{{$post->title}}</h1>
<span class="sub-text">Posted by {{ $post->User->first_name }} {{ substr ( $post->User->last_name , 0, 1 ) }} {{ $post->timeSince() }} {{count($post->comments)}} comments</span>
<h3>Comments</h3>
@foreach($post->comments as $row)
<h4>{{ $post->User->first_name }} {{ substr ( $post->User->last_name , 0, 1 ) }}</h4>
<p>{{$row->content}}</p>
<p>{{ $row->timeSince() }}</p>
@endforeach
@stop