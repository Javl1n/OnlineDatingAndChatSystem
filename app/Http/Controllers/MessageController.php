<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('chats.index', [
            // 'people'=> \App\Models\User::all(),
            // 'posts' => \App\Models\Post::all(),

        ]);
    }

    public function show(User $user)
    {
        return view('chats.show', [
            'receiver' => $user,
        ]);
    }

    public function store(User $user, Request $request)
    {
        $request->validate([
            'message'=> 'required',
        ]);

        Message::create([
            'sender_id' => auth()->user()->id,
            'receiver_id' => $user->id,
            'content' => $request->message,
        ]);

        return back();
    }
}
