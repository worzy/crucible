@section('content')
{{ Form::open() }}
<label for="email">Email</label> <input type="email" name="email" placeholder="Enter your email">
<label for="password">Password</label> <input type="password" name="password" placeholder="Enter your password">
<input type="submit" value="Submit">
{{ Form::close() }}
@stop