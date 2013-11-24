@section('content') 
<h2>Bookmarklet</h2>
<p>Just drag and drop the bookmarklet below into your bookmark bar.</p> 
<p>When you want to share a link just click the bookmark on that page and you'll be taken to Crucible's share page with the details all ready for you to share.</p>
<br>
<a class="bookmarklet" href="javascript:window.location=%22{{URL::route('post.create');}}?u=%22+encodeURIComponent(document.location)+%22&t=%22+encodeURIComponent(document.title)">Share on Crucible</a>
<br>
<br>
<br>
@stop