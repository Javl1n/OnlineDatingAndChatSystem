<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user){
        return view('users.show', [
            'posts' => Post::where('user_id', $user->id)->latest()->get(),
            'user' => $user,
        ]);
    }
}
