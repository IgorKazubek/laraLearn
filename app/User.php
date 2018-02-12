<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return  $this->hasMany(Post::class);
    }

    public function comments(){
        return  $this->hasMany(Comment::class);
    }

    public static function hasSubscribers($user_id){

        return DB::table('subscribers')->where([
            ['user_id', '=', $user_id],
            ['subscriber_id', '=', auth()->user()->id],
        ])->first();
    }
}
