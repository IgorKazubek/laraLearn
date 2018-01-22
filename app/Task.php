<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model{

    public static function isCompleted(){

        return Task::where('completed','0')->get();

    }

    public static function newTask($body){

        $task = new Task;
        $task->body = $body;

        $allTasks = Task::where([
            ['body', $body],
            ['completed', 0]
        ])->first();
        if( empty($allTasks)){
            $task->save();
        }

        else{
            echo 'You have this task';
            die();
        }
    }

}
