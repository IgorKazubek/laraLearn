<?php

namespace App\Providers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('layouts.sidebar', function($view){

            $view->with('archives', \App\Post::getArchives())
                ->with('topUsers', \App\Post::getTopUsers())
                ->with('allCommentators', \App\Comment::allCommentators());

        });
    }

    public function register()
    {
        \App::bind('\App\User',function (){
           return new \App\User();
        });
    }


}
