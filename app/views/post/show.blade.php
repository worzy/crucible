@section('content') 
<h1>{{$post->title}}</h1>
<span class="sub-text">Posted by {{ $post->User->first_name }} {{ substr ( $post->User->last_name , 0, 1 ) }} {{ $post->timeSince() }} {{count($post->comments)}} comments</span>
<h3>Comments</h3>
@foreach($post->comments as $row)
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