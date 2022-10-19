<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;
    public $query;

    public function updatingQuery() {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.users-list', [
            'users' => User::where('name', 'like', '%' . $this->query . '%')->paginate(10)
        ]);
    }
}
