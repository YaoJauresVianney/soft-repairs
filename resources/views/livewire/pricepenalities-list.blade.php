<div class="card p-5">
    <div>
        <label for="query" class="sr-only">Recherche</label>
        <input type="text" wire:model="query" id="query" class="form-control">
    </div>
    <table class="table table-bordered table-hover">
        <thead class="table-success">
            <tr>
                <th>Catégorie véhicule</th>
                <th>Type de Client</th>
                <th>Code</th>
                <th>Montant</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pricepenalities as $pricepenality)
                <tr>
                     <td>{{ $pricepenality->vehiclecategory->fullname }}</td>
                    <td>{{ $pricepenality->peopletype->label }}</td>
                    <td>{{ $pricepenality->code }}</td>
                    <td>{{ $pricepenality->penality_per_day }}</td>
                    <td>
                        <a href="{{ route('pricepenalities.edit', $pricepenality->id) }}"><img src="{{ asset('svg/modify.svg') }}" alt="Modifier" height="20" width="20"></a>
                        <a href="{{ route('pricepenalities.destroy', $pricepenality->id) }}"><img src="{{ asset('svg/delete.svg') }}" alt="Supprimer" height="20" width="20"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $pricepenalities->links() }}
</div>
