@extends('layouts.master')

@section('content')
    <div class="col-sm-6">
        <h3>Create new post</h3>
        <form method="POST" action="/posts/update/{{$post->id}}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" id="body" name="body">{{$post->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
