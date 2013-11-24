@section('content')
<div class="form col4">
{{ Form::open() }}
<fieldset>
    <label for="email">Email address</label> <input type="email" name="email" placeholder="Enter your email">
	<label for="password">Password</label> <input type="password" name="password" placeholder="Enter your password">
	<input class="btn" type="submit" value="Log in"><a class="btn_back" href="/">Back</a>
</fieldset>
{{ Form::close() }}
</div>
@stop