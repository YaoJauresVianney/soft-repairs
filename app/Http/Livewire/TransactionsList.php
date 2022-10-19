<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionsList extends Component
{
    use WithPagination;

    public $query;

    public function updatingQuery()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.transactions-list', [
            'transactions' => Transaction::where('desc', 'like', '%' . $this->query . '%')
            ->where('num_transaction', 'like', '%' . $this->query . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10)
        ]);
    }
}
