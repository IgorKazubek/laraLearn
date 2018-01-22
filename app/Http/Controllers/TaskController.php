<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index(){

        $tasks = Task::isCompleted();

        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task){

        return view('tasks.show', compact('task'));
    }

    public function create(){

        Task::newTask($_POST['body']);
        return redirect('/tasks');

    }

    public function edit($id){

        Task::where('id', $id)->update(['completed' => 1]);
        return redirect('/tasks');

    }

}
