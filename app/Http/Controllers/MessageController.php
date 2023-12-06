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

        $message = Message::create([
            'sender_id' => auth()->user()->id,
            'receiver_id' => $user->id,
            'content' => $request->message,
        ]);

        // if(isset($request->file))
        // {
        //     $message->media()->create([
        //         'mime_type' => $request->file->get
        //     ]);
        // }

        if(isset($request->file)) {
            $message->media()->create([
                'mime_type' => $request->file->getClientOriginalExtension(),
                'url' => $request->file->store('media')
            ]);
        }

        return back();
    }
}
