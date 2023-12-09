<?php

namespace App\Livewire;

use App\Models\FriendList;
use App\Models\User;
use Livewire\Component;

class MatchUser extends Component
{
    public User $user;

    public $matched = false;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function match()
    {
        FriendList::firstOrCreate([
            'from_id' => auth()->user()->id,
            'to_id' => $this->user->id
        ]);
    }

    public function unmatch()
    {
        FriendList::where('from_id', auth()->user()->id)->
                    where('to_id', $this->user->id)->
                    delete();
    }

    public function render()
    {
        if(FriendList::where('from_id', auth()->user()->id)->where('to_id', $this->user->id)->first())
        {
            $this->matched = true;
        }

        return view('livewire.match-user');
    }
}
