<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatBox extends Component
{
    public $receiver;
    public $user;

    public function mount(User $receiver) {
        $this->receiver = $receiver;
        $this->user = Auth::user();
    }

    public function render()
    {
        $messages = Message::whereIn('receiver_id', [$this->receiver->id, $this->user->id])
                            ->whereIn('sender_id', [$this->receiver->id, $this->user->id])
                            ->latest()->get();
        return view('livewire.chat-box', [
            'messages'=> $messages,
        ]);
    }
}