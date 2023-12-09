<?php

namespace App\Livewire;

use App\Models\FriendList;
use App\Models\User;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search = '';
    public function render()
    {
        $matches = FriendList::where('from_id', auth()->user()->id)->get();
        $friends = [];
        foreach($matches as $match)
        {
            $matched = FriendList::where('from_id', $match->to_id)
                                ->where('to_id', auth()->user()->id)->first();
            if(!empty($matched))
            {
                $friends[] = $matched->from_id;
            }
        } 

        sleep(1);
        $users = User::whereIn('id', $friends)->search($this->search)->get();


        $data = [
            'users' => $users,
        ];

        return view('livewire.search-users', $data);
    }
}