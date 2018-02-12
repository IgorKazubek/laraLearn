<?php

namespace App\Http\Controllers;

use Validator;
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

    public function create(Request $request){

        $validator = Validator::make($request->all(),[
            'body' => 'required|max:15',
        ]);

        if ($validator->fails()){
            return redirect('/tasks')
                ->withErrors($validator->errors())
                ->withInput();
        }else{
            $task = new Task;
            $allTasks = Task::where([
                ['body', $request->body],
                ['completed', 0]
            ])->first();
            if (empty($allTasks)) {
                $task->body = $request->body;
                $task->save();
            }
            return redirect('/tasks');
        }
    }

    public function edit($id){

        Task::where('id', $id)->update(['completed' => 1]);
        return redirect('/tasks');

    }

}
