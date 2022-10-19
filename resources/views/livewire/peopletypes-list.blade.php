<div class="card p-5">
    <div>
        <label for="query" class="sr-only">Recherche</label>
        <input type="text" wire:model="query" id="query" class="form-control">
    </div>
    <table class="table table-bordered table-hover">
        <thead class="table-success">
            <tr>
                <td>Code</td>
                <td>Label</td>
                <td>Actif?</td>
                <td>Actions</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($peopletypes as $peopletype)
                <tr>
                    <td>{{ $peopletype->code }}</td>
                    <td>{{ $peopletype->label }}</td>
                    <td><input type="checkbox" {{ $peopletype->is_enabled == 1 ? 'checked' : '' }} disabled></td>
                    <td class="d-flex">
                        <a href="{{ route('peopletypes.edit', $peopletype->id) }}"><img src="{{ asset('svg/modify.svg') }}" alt="Modifier" height="20" width="20"></a>
                        <a href="{{ route('peopletypes.destroy', $peopletype->id) }}"><img src="{{ asset('svg/delete.svg') }}" alt="Supprimer" height="20" width="20"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
    {{ $peopletypes->links() }}
</div>

