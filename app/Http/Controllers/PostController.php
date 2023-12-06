<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'file' => [ File::image() ],
            'content' => 'required'
        ]);

        // ddd($request->file?->getClientOriginalExtension());


        $post = auth()->user()->posts()->create([
            'text_content' => $request->content,
        ]);


        if(isset($request->file)) {
            $post->media()->create([
                'mime_type' => $request->file->getClientOriginalExtension(),
                'url' => $request->file->store('media')
            ]);
        }

        return redirect('/dashboard');

    } 
}
