<div>
    <div>
        <label for="query" class="sr-only">Recherche</label>
        <input type="text" wire:model="query" id="query" class="form-control">
    </div>
   <table class="table table-bordered table-hover">
        <thead class="table-success">
            <tr>
                <th>Nom</th>
                <th>E-mail</th>
                <th>Localisation</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->location }}</td>
                    <td><input type="checkbox" class="form-check" {{ $user->is_enabled == true ? 'checked' : ''}} disabled></td>
                    <td>
                        <a><img src="{{ asset('svg/modify.svg') }}" height="20" width="20" alt="Modifier"></a>
                        <a><img src="{{ asset('svg/delete.svg') }}" height="20" width="20" alt="Supprimer"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
   </table>
   {{ $users->links() }}
</div>
