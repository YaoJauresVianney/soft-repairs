<?php

namespace App\Http\Livewire;

use App\Models\Wrecker;
use Livewire\Component;
use Livewire\WithPagination;

class WreckersList extends Component
{
    use WithPagination;
    public $query;

    public function updatingQuery() {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.wreckers-list', [
            'wreckers' => Wrecker::where('code', 'like', '%' . $this->query . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10)
        ]);
    }
}
