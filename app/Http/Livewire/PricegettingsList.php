<?php

namespace App\Http\Livewire;

use App\Models\Pricegetting;
use Livewire\Component;
use Livewire\WithPagination;

class PricegettingsList extends Component
{
    use WithPagination;
    public $query;

    public function updatingQuery() {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.pricegettings-list', [
            'pricegettings' => Pricegetting::where('price_day', 'like', '%' . $this->query . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10)
        ]);
    }
}
