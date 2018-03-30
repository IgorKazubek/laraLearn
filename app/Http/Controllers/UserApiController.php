<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function getUserInformation(){
        $user = request()->user();
        return response()->json([
           'username' => $user->name,
           'email' => $user->email,
           'time_registered' => $user->created_at()->diffForHumans(),
        ]);
    }
}
