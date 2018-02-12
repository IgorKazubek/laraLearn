<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){

        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function subscribe(User $user){

        DB::table('subscribers')->insert([
           'user_id' => $user->id, 'subscriber_id' => auth()->user()->id
        ]);
        return redirect()->back();
    }

    public function unSubscribe(User $user){

       DB::table('subscribers')->where([
        ['user_id', '=', $user->id],
            ['subscriber_id', '=', auth()->user()->id],
        ])->delete();

       return redirect()->back();
    }

}
