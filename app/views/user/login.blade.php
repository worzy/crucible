@section('content')
<div class="form col6 pre1 suf2">
{{ Form::open() }}
@foreach ($errors->all() as $error)
    <p><span class="error">&times;</span> {{ $error }}</p>
@endforeach
<fieldset>

    	<input class="login" type="email" name="email" placeholder="Email Address" autofocus>
		<input class="login" type="password" name="password" placeholder="Password">
		<input class="btn" type="submit" value="Log in"><a class="btn btn_back" href="/">Back</a>

</fieldset>
{{ Form::close() }}
</div>
@stop