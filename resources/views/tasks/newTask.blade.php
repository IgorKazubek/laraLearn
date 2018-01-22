<form method="post" action="{{action('TaskController@newTask')}}">
    {{ csrf_field() }}

    <input type="text" name="body" required>

    <button type="submit">Submit</button>

</form>
