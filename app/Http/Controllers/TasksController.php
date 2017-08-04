<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index() 
    {
    	$tasks = Task::all();

    	return view('tasks.index',compact('tasks'));
    }


    /* OLD ONE  
	
    public function show() {

	$task = DB::table('tasks')->find($id);

    return view('tasks.show',compact('task'));

    }

    */

    /* New Style on syntex based on App/Task model */
    public function show(Task $task) {

		return $task;
    	return view('tasks.show',compact('task'));

    }
}
