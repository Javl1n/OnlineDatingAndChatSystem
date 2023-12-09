<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ReportUser extends Component
{
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.report-user');
    }
}
