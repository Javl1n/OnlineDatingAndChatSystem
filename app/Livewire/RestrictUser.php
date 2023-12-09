<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class RestrictUser extends Component
{
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function restrict()
    {
        $this->user->update(['restricted' => true]);
    }

    public function unrestrict()
    {
        $this->user->update(['restricted' => false]);
    }
    public function render()
    {
        return view('livewire.restrict-user', [
            'restricted' => $this->user->restricted
        ]);
    }
}
