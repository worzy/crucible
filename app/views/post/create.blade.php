@section('content')
{{ Form::open(array('url' => 'post')) }}
@foreach ($errors->all() as $error)
    <p><span class="error">&times;</span> {{ $error }}</p>
@endforeach
<label for="title">Title</label> <input type="text" name="title" placeholder="What's the subject of the link?">
<label for="url">URL</label> <input type="text" name="url" placeholder="Paste the link URL here">
<label for="tags">Tags</label> <input type="text" name="tags" placeholder="Use a comma to seperate your tags">
<?php //<label for="content">Description</label> <textarea name="content"></textarea>?>
<input class="btn" type="submit" value="Share">
{{ Form::close() }}
@stop