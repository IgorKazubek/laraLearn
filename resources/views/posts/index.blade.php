
@extends('layouts.master')

@section('title')
    All posts
@endsection

@section('content')
    <div class="col-sm-8">
        <form method="post" action="/posts/create" class="new_post_form">
            {{ csrf_field() }}
            <button class="btn btn-primary" type="submit">Create new post</button>
        </form>
        <ul>
            @foreach($posts as $post)
                <div>
                    @if(is_array($post))
                        <h3>{{$post['title']}}</h3>
                        <p>Author: {{$post['name']}}</p>
                        <p>{{str_limit($post['body'], 200)}} <a href="/posts/{{$post['id']}}">more</a></p>
                    @else
                        <h3>{{$post->title}}</h3>
                        <p>Author: {{$post->user->name}}</p>
                        <p>{{str_limit($post->body, 200)}} <a href="/posts/{{$post->id}}">more</a></p>
                    @endif
                </div>
            @endforeach
        </ul>
    </div>

    @include('layouts.sidebar')
@endsection

