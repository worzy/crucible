<?php

class UserController extends BaseController {


	public function getRegister()
	{
		$this->layout->content = View::make('user.register');
	}

	public function postRegister()
	{
		try
		{
		    // Let's register a user.
		    $user = Sentry::register(array(
		        'email'    		=> Input::get('email'),
		        'password' 		=> Input::get('password'),
		        'first_name' 	=> Input::get('first_name'),
		        'last_name' 	=> Input::get('last_name'),
		    ), true);

		    if($user)
		    {
		    	return Redirect::route('home');
		    }
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
		    echo 'User with this login already exists.';
		}

		$this->layout->content = View::make('user.register');
	}

	public function getLogin()
	{
		$this->layout->content = View::make('user.login');
	}

	public function postLogin()
	{
		try
		{
		    // Set login credentials
		    $credentials = array(
		        'email'    => Input::get('email'),
		        'password' => Input::get('password'),
		    );

		    // Try to authenticate the user
		    $user = Sentry::authenticate($credentials, false);

		    if($user)
		    {
		    	return Redirect::route('home');
		    }
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
		    echo 'Login field is required.';
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    echo 'Password field is required.';
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    echo 'Wrong password, try again.';
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    echo 'User was not found.';
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    echo 'User is not activated.';
		}

		// The following is only required if throttle is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
		    echo 'User is suspended.';
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
		    echo 'User is banned.';
		}

		$this->layout->content = View::make('user.login');
	}

	public function getLogout()
	{
		// Kill the login
		Sentry::logout();

		return Redirect::route('home');
	}

}