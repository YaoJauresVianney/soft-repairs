<?php

namespace App\Http\Livewire;

use App\Models\Pricepenality;
use Livewire\Component;
use Livewire\WithPagination;

class PricepenalitiesList extends Component
{
    use WithPagination;
    public $query;

    public function updatingQuery() {
        $this->resetPage();
    }

    public function render()
    {

        return view('livewire.pricepenalities-list', [
            'pricepenalities' => Pricepenality::where('penality_per_day', 'like', '%' . $this->query . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10)
        ]);
    }
}
