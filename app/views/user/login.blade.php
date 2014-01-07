@section('content')
<div class="form col4">
{{ Form::open() }}
@foreach ($errors->all() as $error)
    <p><span class="error">&times;</span> {{ $error }}</p>
@endforeach
<fieldset>

    	<label for="email">Email address</label> <input type="email" name="email" placeholder="Enter your email" autofocus>
		<label for="password">Password</label> <input type="password" name="password" placeholder="Enter your password">
		<input class="btn" type="submit" value="Log in"><a class="btn btn_back" href="/">Back</a>

</fieldset>
{{ Form::close() }}
</div>
@stop