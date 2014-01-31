<?php

class ContactsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Get all contacts
		$contacts = Contacts::all();

		// Load the view and pass the contacts
		return View::make('contacts.index')->with('contacts', $contacts);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Load the create form (app/views/contacts/create.blade.php)
		return View::make('contacts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Validation process
		$rules = [
			'name'   => 'required',
			'email'  => 'required|email',
			'mobile' => 'required|numeric'
		];
		$validator = Validator::make(Input::all(), $rules);
		
		// Process the login
		if ($validator->fails())
		{
			return Redirect::to('contacts/create')->withErrors($validator)->withInput(Input::except('password'));
		} 
		else 
		{
			// Store input
			$contact = new Contacts;
			$contact->name   = Input::get('name');
			$contact->email  = Input::get('email');
			$contact->mobile = Input::get('mobile');
			$contact->save();

			// Redirect
			Session::flash('message', 'Contact created successfully');
			return Redirect::to('contacts');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// Retrieve contact
		$contact = Contacts::find($id);

		// Show the view and pass the contact to it
		return View::make('contacts.show')->with('contacts', $contact);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// Retrieve contact
		$contact = Contacts::find($id);

		// Show edit form and pass in the contact
		return View::make('contacts.edit')->with('contacts', $contact);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Validation process
		$rules = [
		'name'   => 'required',
		'email'  => 'required|email',
		'mobile' => 'required|numeric'
		];

		$validator = Validator::make(Input::all(), $rules);

		// Process the login
		if ($validator->fails())
		{
			return Redirect::to('contacts/' . $id . '/edit')->withErrors($validator)->withInput(Input::except('password'));
		} 
		else 
		{
			// Store
			$contact = Contacts::find($id);
			$contact->name   = Input::get('name');
			$contact->email  = Input::get('email');
			$contact->mobile = Input::get('mobile');
			$contact->save();

			// Redirect
			Session::flash('message', 'Contact updated successfully');
			return Redirect::to('contacts');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// Delete contact
		$contact = Contacts::find($id);
		$contact->delete();

		// Redirect
		Session::flash('message', 'Contact deleted');
		return Redirect::to('contacts');
	}

}