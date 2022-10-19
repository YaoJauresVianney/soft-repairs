<?php

namespace App\Http\Livewire;

use App\Models\Repair;
use Livewire\Component;
use Livewire\WithPagination;

class RepairsList extends Component
{
    use WithPagination;

    public $query;

    public function updatingQuery() {
        $this->resetPage();
    }

    public function render()
    {

        return view('livewire.repairs-list', [
            'repairs' => Repair::where('car_imm', 'like', '%' . $this->query . '%')
            ->where('date_release', '=', null)
            ->where('state', '=', 'pending')
            ->where('archived', 0)
            ->orderBy('date_getting', 'desc')
            ->paginate(10)
        ]);
    }
}
