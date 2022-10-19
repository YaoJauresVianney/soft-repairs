<div class="card p-5">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div>
        <label for="query" class="sr-only">Recherche</label>
        <input type="text" wire:model="query" id="query" class="form-control">
    </div>
    <table class="table table-bordered table-hover">
        <thead class="table-success">
            <tr>
                <th>Catégorie</th>
                <th>Type de Client</th>
                <th>Forfait Jour</th>
                <th>Forfait Nuit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pricegettings as $pricegetting)
                <tr>
                    <td>{{ $pricegetting->vehiclecategory->fullname }}</td>
                    <td>{{ $pricegetting->peopletype->label }}</td>
                    <td>{{ $pricegetting->price_day }}</td>
                    <td>{{ $pricegetting->price_night }}</td>
                    <td>
                        <a href="{{ route('pricegettings.edit', $pricegetting->id) }}">
                            <img src="{{ asset('svg/modify.svg') }}" alt="modifier" height="20" width="20">
                        </a>
                        <a href="{{ route('pricegettings.destroy', $pricegetting->id) }}">
                            <img src="{{ asset('svg/delete.svg') }}" alt="Supprimer" height="20" width="20">
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
    {{ $pricegettings->links() }}
</div>
