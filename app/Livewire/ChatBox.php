<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatBox extends Component
{
    public User $receiver;
    public $user;

    public $messages;

    public function mount(User $receiver) {
        $this->receiver = $receiver;
        $this->user = Auth::user();
    }

    public function render()
    {
        $this->messages = Message::whereIn('receiver_id', [$this->receiver->id, $this->user->id])
                            ->whereIn('sender_id', [$this->receiver->id, $this->user->id])
                            ->latest()->get();
        return view('livewire.chat-box');
    }
}