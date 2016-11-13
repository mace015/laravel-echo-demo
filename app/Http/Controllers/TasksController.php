<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\{TaskCreated, TaskDeleted};

use App\Models\Task;

class TasksController extends Controller
{
    
	public function index() {

		return response()->json(Task::all());

	}

	public function create() {

		$task = Task::create(['task' => request()->task]);

		broadcast(new TaskCreated($task))->toOthers();

		return response()->json($task);

	}

	public function delete() {

		$task = Task::find(request()->id);

		broadcast(new TaskDeleted($task->id))->toOthers();

		$task->delete();

		return $task;

	}

}
