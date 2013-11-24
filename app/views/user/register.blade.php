@section('content')
{{ Form::open() }}

<div class="col6">
	@foreach ($errors->all() as $error)
	    <p><span class="error">&times;</span> {{ $error }}</p>
	@endforeach
	<fieldset>
		<label for="name">Name</label> <input type="text" name="first_name" placeholder="John Smith?">
		<label for="email">Email</label> <input type="email" name="email" placeholder="We will pull your Gravatar using this.">
		<label for="password">Password</label> <input type="password" name="password" placeholder="Is it a secret? Is it safe?">
		<input class="btn" type="submit" value="Sign up"><a class="btn_back" href="/">Back</a>
	</fieldset>
</div>
{{ Form::close() }}
@stop