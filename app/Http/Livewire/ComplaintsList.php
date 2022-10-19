<?php

namespace App\Http\Livewire;

use App\Models\Complaint;
use Livewire\Component;
use Livewire\WithPagination;

class ComplaintsList extends Component
{
    use WithPagination;
    public $query;

    public function updatingQuery() {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.complaints-list', [
            'complaints' => Complaint::where('car_imm', 'like', '%'. $this->query .'%')->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
}
