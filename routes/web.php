<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Database\Eloquent\Model;

use App\Task;

Route::get('/', 'PostsController@index' )->name('home'); //for homepage

/* task */
/* change to ---> Route::get('/tasks', 'TasksController@index' );
Route::get('/tasks', function () {

	$tasks = DB::table('tasks')->latest()->get();

    return view('tasks.index',compact('tasks'));
});

*/

/* change to ---> Route::get('/tasks/{task}', 'TasksController@show' );
Route::get('/tasks/{task}', function ($id) { // to get coloum by id

	$task = DB::table('tasks')->find($id);

    return view('tasks.show',compact('task'));
});
*/

Route::get('/tasks', 'TasksController@index' );

Route::get('/tasks/{task}', 'TasksController@show' ); /*task per id*/
/* end task */


/*posts*/

Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store'); //to post in database
Route::get('/posts/{post}', 'PostsController@show'); //to get from database
Route::post('/posts/comments/{post}', 'CommentsController@store'); //to post in database


Route::get('/register', 'RegistrationController@create'); //to get from database
Route::post('/register', 'RegistrationController@store'); //to post in database


Route::get('/login', 'SessionsController@create')->name('login'); //to get from database

Route::post('/login','SessionsController@store');

Route::get('/logout', 'SessionsController@destroy'); //to get from database


/* end posts*/