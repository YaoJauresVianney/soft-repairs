<div class="card p-5">
    <div>
        <label for="query" class="sr-only">Recherche</label>
        <input type="text" wire:model="query" id="query" class="form-control">
    </div>
        <table class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <td>Agent IDE</td>
                    <td>Numéro Transaction</td>
                    <td>Type</td>
                    <td>Amount</td>
                    <td>Way_of</td>
                    <td>Actions</td>
                </tr>
            </thead>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->user->name }} - {{ $transaction->user->location }}</td>
                    <td>{{ $transaction->num_transaction }}</td>
                    <td>{{ $transaction->type }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->way_of }}</td>
                    <td class="d-flex">
                        <a href="{{ route('transactions.edit', $transaction->id) }}">
                            <img src="{{ asset('svg/modify.svg') }}" alt="Modifier" height="20" width="20">
                        </a>
                        <a href="{{ route('transactions.destroy', $transaction->id) }}">
                            <img src="{{ asset('svg/delete.svg') }}" alt="Supprimer" height="20" width="20">
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $transactions->links() }}
</div>
