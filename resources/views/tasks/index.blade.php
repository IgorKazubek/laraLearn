<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 10.01.2018
 * Time: 15:36
 */?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<ul>

    @foreach ($tasks as $task)
    <li style="margin: 3px">
        <div>
            <div style="width: 200px; float: left">

                <a href="/tasks/<?php echo $task->id?>">
                    {{$task->body}}
                </a>
            </div>
            <button style=" margin-left: 15px"><a href="/tasks/update/{{$task->id}}" style="text-decoration: none">Done</a></button>
        </div>

    </li>
        @endforeach
</ul>

<form method="post" action="{{action('TaskController@create')}}" style="margin-left: 20px">
    {{ csrf_field() }}
    <label for="body">New task:</label>
    <input type="text" name="body" required>

    <button type="submit">Submit</button>

</form>

</body>
</html>
