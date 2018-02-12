@extends('layouts.master')
@section('title')
    Users
@endsection
@section('content')
<div class="col-sm-8  all-users">
    @foreach($users as $user)
        <div class="col-sm-6  subscribe-on-user">
            <div class="col-sm-6">
                <h3>{{$user->name}}</h3>
            </div>
            <div class="col-sm-6">
                @if (count(\App\UserFacade::hasSubscribers($user->id)) > 0)
                    <form class="sub-btn"  method="post" action="/users/unsubscribe/{{$user->id}}">
                        {{ csrf_field() }}
                        {{method_field('DELETE')}}
                        <button class="btn-danger">Unsubscribe</button>
                    </form>
                @elseif($user->id != auth()->user()->id)
                    <form class="sub-btn"  method="post" action="/users/subscribe/{{$user->id}}">
                        {{ csrf_field() }}
                        <button class="btn-primary">Subscribe</button>
                    </form>
                @else
                    <form class="sub-btn">
                        <button class="btn-warning disabled">You</button>
                    </form>

                @endif
           </div>
        </div>
    @endforeach
</div>
    @include('layouts.sidebar')
@endsection