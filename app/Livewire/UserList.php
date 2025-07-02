<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserList extends Component
{
    public function render()
    {
        $users = User::simplePaginate(50);

        return view('livewire.user-list', [
            'users' => $users,
        ]);
    }
}
