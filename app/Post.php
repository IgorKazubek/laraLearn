<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments(){

        return $this->hasMany(Comment::class);

    }

    public function user(){

        return $this->belongsTo(User::class);

    }

    public static function getTopUsers(){

        return Post::leftJoin('users','users.id', '=','posts.user_id')
            ->selectRaw('users.name as name, COUNT(posts.id) as count')
            ->groupBy('users.name')
            ->orderBy('count','desc')
            ->limit(10)
            ->get();

    }

    public static function getArchives(){

        return Post::selectRaw('year(created_at) as year, monthname(created_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get();

    }

    public static function getPostsByAuthor($author){

        return Post::leftJoin('users','users.id', '=','posts.user_id')
            ->select('posts.id as id', 'users.id as user', 'users.name as name', 'title', 'body', 'posts.created_at' )
            ->where('users.name', '=', $author)
            ->orderBy('posts.created_at','desc')
            ->get()->toArray();

    }
}
