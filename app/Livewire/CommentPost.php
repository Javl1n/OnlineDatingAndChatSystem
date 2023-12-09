<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class CommentPost extends Component
{
    public $content;

    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function send()
    {
        $this->post->comments() ->create([
            'user_id' => auth()->user()->id,
            'content' => $this->content
        ]);

        $this->content = '';
    }

    public function render()
    {   
        $this->content = '';
        return view('livewire.comment-post');
    }
}
