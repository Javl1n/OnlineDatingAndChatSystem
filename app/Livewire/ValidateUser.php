<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ValidateUser extends Component
{
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function verify()
    {
        $this->user->verification->update(['verified' => true]);
    }

    public function unverify()
    {
        $this->user->verification->update(['verified' => false]);
    }

    public function render()
    {   
        return view('livewire.validate-user', [
            'verified' => $this->user->verification->verified
        ]);
    }
}
