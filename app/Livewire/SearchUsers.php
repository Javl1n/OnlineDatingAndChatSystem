<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search = '';
    public function render()
    {
        sleep(1);
        $users = User::whereNot('id', auth()->user()->id)->search($this->search)->get();

        $data = [
            'users' => $users,
        ];

        return view('livewire.search-users', $data);
    }
}