<div class="card p-5">
    <div>
        <label for="query" class="sr-only">Recherche</label>
        <input type="text" wire:model="query" id="query" class="form-control">
    </div>
    <table class="table table-bordered table-hover">
        <thead class="table-success">
            <tr>
                <td>Code</td>
                <td>Immatriculation</td>
                <td>label</td>
                <td>Actif?</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($wreckers as $wrecker)
                <tr>
                    <td>{{ $wrecker->code }}</td>
                    <td>{{ $wrecker->car_imm }}</td>
                    <td>{{ $wrecker->label }}</td>
                    <td><input type="checkbox" {{ $wrecker->is_enabled ? 'checked' : '' }} disabled/></td>
                    <td class="d-flex">
                        <a href="{{ route('wreckers.edit', $wrecker->id) }}"><img src="{{ asset('svg/modify.svg') }}" alt="Modifier" height="20" width="20"></a>
                        <a href="{{ route('wreckers.destroy', $wrecker->id) }}"><img src="{{ asset('svg/delete.svg') }}" alt="Supprimer" height="20" width="20"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
    {{ $wreckers->links() }}
</div>
