<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', 'HomeController@showWelcome');


Route::get('users', function()
{
    $users = User::all();

    return View::make('users')->with('users', $users);
});


// Route to show the login form
Route::get('login', array('uses' => 'HomeController@showLogin'));

// Route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));

// Route to logout
Route::get('logout', array('uses' => 'HomeController@doLogout'));

// Route to secure area
// Route::get('secure', array('uses' => 'HomeController@showSecure'));

/**
* Secure-Routes
*
* Add as many routes as you like to the group and will be secured by user-authentication
*/
Route::group(array('before' => 'auth'), function()
{
	Route::resource('contacts', 'ContactsController');
});
