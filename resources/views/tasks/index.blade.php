<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
@extends('layouts.master')
@section('title')
    Tasks
@endsection
@section('content')

    <ul>
        @foreach ($tasks as $task)
            <li id="task_{{$task->id}}" style="margin: 3px">
                <div>
                    <div style="width: 200px; float: left">
                        <a href="/tasks/{{$task->id}}">
                            {{$task->body}}
                        </a>
                    </div>
                    <button class="done-btn" id="{{$task->id}}" style=" margin-left: 35px">Done</button>
                </div>

            </li>
        @endforeach
    </ul>

    <form method="post" action="{{action('TaskController@create')}}" style="margin-left: 20px">
        {{ csrf_field() }}
        <label for="body">New task:</label>
        <input type="text" name="body">
        <button type="submit">Submit</button>
    </form>

    @if(count($errors))
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

<script>

    $('#document').ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.done-btn').on('click', function () {
            var taskId = this.id;

            $.ajax({
                method: 'post',
                url: '/tasks/update/' + taskId,
                data: taskId,
                success: function(){
                    $('#task_'+ taskId).remove();
                }
            });
        });
    });

</script>

</body>
</html>
