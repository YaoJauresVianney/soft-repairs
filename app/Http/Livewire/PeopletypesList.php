<?php

namespace App\Http\Livewire;

use App\Models\Peopletype;
use Livewire\Component;
use Livewire\WithPagination;

class PeopletypesList extends Component
{
    use WithPagination;
    public $query;

    public function updatingQuery() {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.peopletypes-list', [
            'peopletypes' => Peopletype::where('code', 'like', '%' . $this->query . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10)
        ]);
    }
}
