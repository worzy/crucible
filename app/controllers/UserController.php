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
		    $errors = $e->getMessage();
		    return Redirect::to('register')->withErrors($errors);
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    $errors = $e->getMessage();
		    return Redirect::to('register')->withErrors($errors);
		}
		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
		    $errors = $e->getMessage();
		    return Redirect::to('register')->withErrors($errors);
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
		    $errors = $e->getMessage();
		    return Redirect::to('login')->withErrors($errors);
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
		    $errors = $e->getMessage();
		    return Redirect::to('login')->withErrors($errors);
		}
		catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
		    $errors = $e->getMessage();
		    return Redirect::to('login')->withErrors($errors);
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
		    $errors = $e->getMessage();
		    return Redirect::to('login')->withErrors($errors);
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
		    $errors = $e->getMessage();
		    return Redirect::to('login')->withErrors($errors);
		}

		// The following is only required if throttle is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
		    $errors = $e->getMessage();
		    return Redirect::to('login')->withErrors($errors);
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
		    $errors = $e->getMessage();
		    return Redirect::to('login')->withErrors($errors);
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