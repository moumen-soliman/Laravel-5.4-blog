<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
    	return view('registration.create'); //to view page
    }

    public function store()
    {
    	//Validate the form.
    	$this->validate(request(),[

    		'name' => 'required',

    		'email' => 'required|unique:users|email',

    		'password' => 'required|confirmed' //confirmed here based on confirm password 

    		]);

    	//Create and save the user.
    	$user = User::create(request(['name','email','password']));

    	//sign them in.
    	auth()->login($user);

    	//Redirect to the home page
    	return redirect()->home(); //->home(); based on route file , check name for ('/') in web.php file
    }
}
