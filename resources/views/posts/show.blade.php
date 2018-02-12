
@extends('layouts.master')

@section('title')
    {{$post->title}}
@endsection

@section('content')
<div class="col-sm-8">

    {{'USER ID' . Auth::user()->id .' '.' POST US ID'.$post->user_id}}

    {{dd($post)}}
    <h3>{{$post->title}}</h3>

    @if(!is_null($post->created_at))
        <p>Published: {{$post->created_at->format('d.m.Y')}}</p>
    @endif

    <p>{{$post->body}}</p>

    @if(Auth::check())

        @if(Auth::user()->id == $post->user_id)

            <div class="edit_delete_post_button">
                <form method="POST" action="/posts/edit/{{$post->id}}">
                    {{ csrf_field() }}
                    <button class="btn-warning">Edit</button>
                </form>

                <form method="POST" action="/posts/{{$post->id}}">
                    {{ csrf_field() }}
                    {{method_field('DELETE')}}
                    <button class="btn-danger">Delete</button>
                </form>
            </div>
        @endif

    @endif

    <div class="comments">
        <h4>Comments:</h4>

        <ul>
            @if($post->comments->isEmpty())
                <div>No comments yet</div>
            @else
                @foreach($post->comments as $comment)

                    <li class="list-group-item">
                        <div class="comment-user-name">
                            {{$comment->user->name}}:
                        </div>
                        <div class="comment-body">
                            {{$comment->body}}
                        </div>
                        <div class="comment-time">{{$comment->created_at->diffForHumans()}}</div>
                    </li>
                @endforeach
            @endif
        </ul>

        @if(Auth::check())

            <div class="add-comment">
                <form class="form-group" method="POST" action="/posts/{{$post->id}}/comments">
                    {{ csrf_field() }}
                    <textarea class="form-control" name="body" placeholder="Your comment might be here"></textarea>

                    <button class="btn-primary save-comment-btn">Save comment</button>
                </form>

                @foreach($errors->all() as $error)

                    {{$error}}

                @endforeach
            </div>

            @else Register to write comments.
        @endif

    </div>
</div>
@include('layouts.sidebar')
@endsection

