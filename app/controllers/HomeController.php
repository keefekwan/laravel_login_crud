<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('home');
	}

	public function showSecret()
	{
		return View::make('secret');
	}

	public function showLogin()
	{
		// Show the form
		return View::make('login');
	}

	public function doLogin()
	{
		// Validate the info, create fules for the inputs
		$rules = array(
			'email'    => 'required|email', // Verify the email is an actual email
			'password' => 'required|alphaNum|min:3' // Password can only be alphanumeric and has to be greater than 3 characters
		);
	
		// Run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')
			->withErrors($validator) // Send back all errors to the login form
			->withInput(Input::except('password')); // Send back input except for password to re-populate the form
		} else {
			// Create our user data for the authentication
			$userdata = array(
				'email'    => Input::get('email'),
				'password' => Input::get('password')
			);

			// Attempt to do the login
			if (Auth::attempt($userdata)) {

				return Redirect::to('contacts');
				
			} else {
				// Validation failed
				return Redirect::to('login');
			}
		}
	}

	public function showSecure()
	{
		return View::make('contacts');
	}

	public function index()
	{
		// Get all users
		$user = User::all();

		// Load the view and pass the user
		return View::make('contacts')->with('user', $user);
	}

	public function show()
	{
		// Retrieve Contact
		$user = User::find($id);

		// Show edit form and pass in the user
		return View::make('contacts')->with('user', $user);
	}


	public function doLogout()
	{
		Session::flush(); // empty the session
		return Redirect::to('login'); // redirect the user to the login screen
	}

}