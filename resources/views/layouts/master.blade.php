<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/welcome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/main.css')}}">
</head>
<body>
{{--CRUTCH--}}
@if(Auth::check())
<div class="panel panel-default" >
    @else <div class="panel panel-default" style="height: 5%" >
@endif
{{--END OF CRUTCH--}}
    <div class="panel-heading">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">Test Laravel Site</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="/tasks">Tasks</a></li>
                    <li><a href="/posts">Posts</a></li>
                    <li><a href="/users">Users</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Route::has('login'))
                        <li class="top-right links">
                            @if (Auth::check())
                                <a href="{{ url('/home') }}">Home</a>
                        </li>
                            @else
                                <div class="log_or_reg">
                                    <li><a href="{{ url('/login') }}">Login</a></li>
                                    <li><a href="{{ url('/register') }}">Register</a></li>
                                </div>
                            @endif
                    @endif
                </ul>
            </div>
        </nav>
    </div>

    <div class="panel-body">
        @yield('content')
    </div>


    <div class="panel-footer">
        Created by Igor Kazubek
    </div>
</div>


</body>
</html>