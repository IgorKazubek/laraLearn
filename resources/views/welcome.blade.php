<!doctype html>
<html lang="{{ app()->getLocale() }}">

    @extends('layouts.master')
    @section('title')
        Lara Test
    @endsection
    @section('content')
        <div class="flex-center full-height">
            <div class="content">

                @if(Auth::check())
                    Welcome, {{Auth::user()->name}}!
                @else Welcome, my friend!
                @endif

            </div>
        </div>
    @endsection
</html>
