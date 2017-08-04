<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use Carbon\Carbon;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); // for no one can join this page , must be login in first expect index and show
    }

    public function index()
    {

    	// $posts = Post::all(); //this for all posts
    	// $post = Post::orderBy('created_at','DESC')->get(); // order by condetion from SQL CHECK Builder.php


        $posts = Post::latest()

            ->filter(request(['month' , 'year']))

            ->get();


        //Temporary

        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')

        ->groupBy('year','month')

        ->orderByRaw('min(created_at) desc')

        ->get()

        ->toArray();

    	return view('posts.index', compact('posts' , 'archives'));
    }

    public function show(Post $post)
    {

       //Temporary 
        
        /* convert to Post::archives(); 
        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')

        ->groupBy('year','month')

        ->orderByRaw('min(created_at) desc')

        ->get()

        ->toArray();
        */

    	return view('posts.show', compact('post'));
    }


    public function create()
    {
    	return view('posts.create');
    }


    public function store()
    {
    	// Create a new post using the request data

    	/* 
    	$post = new Post; //pased on new App\Post;

    	$post->title = request('title');

    	$post->body = request('body');
		

    	// Save it to the database
    	$post-save(); 
		*/



		//validate is require on page create to add rules for every input 
    	$this->validate(request(),[

    		'title' => 'required|max:10',
    		'body' => 'required'
    	]);

        auth()->user()->publish(
            new Post(request(['title','body']))
        );

		Post::create([

            'title' => request('title') , 

            'body' => request('body'),

            'user_id' => auth()->id()

        ]); //title,body based on page create.post


    	// And then redirect to the home page.
    	return redirect('/');

    }

}
