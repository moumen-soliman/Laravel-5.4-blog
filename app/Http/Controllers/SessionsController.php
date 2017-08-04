<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

	public function __construct()
	{
		$this->middleware('guest' , ['except' => 'destroy']); // redirect anyone login to homepage don't see login page
	}
	
    public function create()
    {
    	return view('sessions.create');
    }

    public function store()
    {

    	// Attempt to authenticate the user + If not, redirect back.

    	if (! auth()->attempt(request(['email' , 'password']))){

    		return back()->withErrors([

    			'message' => 'Please chech your credntials and try again'

    		]);
    	}


    	// If so, sign them in.

    	// Redirect to home page
    	return redirect()->home();
    }

    public function destroy()
    {

    	auth()->logout();
    	return redirect()->home();

    }
}
