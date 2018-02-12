<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Comment extends Model

{
    public function post(){

        return $this->belongsTo(Post::class);

    }

    public function user(){

        return $this->belongsTo(User::class);

    }

    public static function allCommentators(){

        return Comment::leftJoin('users', 'users.id', '=', 'comments.user_id')
            ->selectRaw('count(users.id) as count, users.name as name')
            ->groupBy('users.name')
            ->orderBy('count','desc')
            ->limit(10)
            ->get();

//      return User::with('comments')->addSelect(DB::raw('COUNT(user.id) as Comments'))->groupBy('user_id')->orderBy('Comments')->get();
}


}
