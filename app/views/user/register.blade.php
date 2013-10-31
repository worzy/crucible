@section('content')
{{ Form::open() }}
<label for="email">Email</label> <input type="email" name="email" placeholder="Enter your email">
<label for="first_name">First name</label> <input type="text" name="first_name" placeholder="Please enter your first name">
<label for="last_name">Last name</label> <input type="text" name="last_name" placeholder="Please enter your last name">
<label for="password">Password</label> <input type="password" name="password" placeholder="Enter your password">
<input type="submit" value="Submit">
{{ Form::close() }}
@stop