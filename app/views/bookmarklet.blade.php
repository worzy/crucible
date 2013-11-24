@section('content') 
<a href="javascript:window.location=%22{{URL::route('post.create');}}?u=%22+encodeURIComponent(document.location)+%22&t=%22+encodeURIComponent(document.title)">Bookmarklet</a>
@stop