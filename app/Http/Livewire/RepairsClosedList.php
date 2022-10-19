<?php

namespace App\Http\Livewire;

use App\Models\Repair;
use Livewire\Component;
use Livewire\WithPagination;

class RepairsClosedList extends Component
{
    use WithPagination;

    public $query;

    public function updatingQuery() {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.repairs-closed-list', [
            'repairs' => Repair::where('car_imm', 'like', '%' . $this->query . '%')
            ->where('state', '=', 'closed')
            ->where('archived', '=', 1)
            ->orderBy('date_release', 'desc')
            ->paginate(10)
        ]);
    }
}
