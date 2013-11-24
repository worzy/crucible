@section('content')
{{ Form::open(array('url' => 'post')) }}
@foreach ($errors->all() as $error)
    <p><span class="error">&times;</span> {{ $error }}</p>
@endforeach
<label for="title">Title</label> <input type="text" name="title" placeholder="What's the subject of the link?" value="{{ Input::old('title') }}">
<label for="url">URL</label> <input type="text" name="url" placeholder="Paste the link URL here" value="{{ Input::old('url') }}">
<label for="tags">Tags</label> <input type="text" name="tags" placeholder="Use a comma to seperate your tags" value="{{ Input::old('tags') }}">
<?php //<label for="content">Description</label> <textarea name="content"></textarea>?>
<input class="btn" type="submit" value="Share"> <a class="btn_back" href="/">Back</a>
{{ Form::close() }}
@stop