@section('content')
{{ Form::open(array('url' => 'post')) }}
@foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
@endforeach
<label for="title">Title</label> <input type="text" name="title" placeholder="Title">
<label for="url">URL</label> <input type="text" name="url" placeholder="Url">
<?php //<label for="content">Description</label> <textarea name="content"></textarea>?>
<input type="submit" value="Submit">
{{ Form::close() }}
@stop