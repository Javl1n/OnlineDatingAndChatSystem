<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ApprovePost extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function approve()
    {
        $this->post->update(['approved' => true, 'created_at' => now()]);
    }

    public function render()
    {
        return view('livewire.approve-post', [
            'approved' => $this->post->approved
        ]);
    }
}
