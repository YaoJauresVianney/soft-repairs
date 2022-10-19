<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;
use Livewire\WithPagination;

class ClientsList extends Component
{
    use WithPagination;
    public $query = '';

    public function updatingQuery() {
        $this->resetPage();
    }

    public function render()
    {

        return view('livewire.clients-list', [
            'clients' => Client::where([
                ['deleted_at', '=', null],
                ['fullname', 'like', '%' . $this->query . '%'],

            ])
            ->orderBy('created_at', 'desc')
            ->paginate(10)
        ]);
    }
}
