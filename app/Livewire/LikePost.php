<?php

namespace App\Livewire;

use App\Models\Like;
use App\Models\Post;
use Livewire\Component;

class LikePost extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function like()
    {
        $this->post->likes()->create([
            'user_id' => auth()->user()->id
        ]);
    }

    public function unlike()
    {
        $this->post->likes()->where('user_id' , auth()->user()->id)->delete();
    }

    public function render()
    {
        $likes = $this->post->likes()->count();

        $liked = false;

        if($this->post->likes()->where('user_id', auth()->user()->id)->first()){
            $liked = true;
        }

        return view('livewire.like-post', [
            'display' => $likes !== 0 ? $likes : 'Like',
            'liked' => $liked
        ]);
    }
}
