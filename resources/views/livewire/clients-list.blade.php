<div>

        <div>
            <label for="query" class="sr-only">Recherche</label>
            <input type="text" wire:model="query" id="query" class="form-control">
        </div>
        <table class="table table-bordered">
            <thead class="table-success">
                <tr>
                    <td>Fullname</td>
                    <td>CNI</td>
                    <td>Passeport</td>
                    <td>Permis de conduire</td>
                    <td>phone_1</td>
                    <td>phone_2</td>
                    <td>Actions</td>
                </tr>
            </thead>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->fullname }}</td>
                    <td>{{ $client->cni }}</td>
                    <td>{{ $client->passport }}</td>
                    <td>{{ $client->num_license }}</td>
                    <td>{{ $client->phone1 }}</td>
                    <td>{{ $client->phone2 }}</td>
                    <td class="d-flex">
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn">
                            <img src="{{ asset('svg/modify.svg') }}" height="24px" width="24px">
                        </a>
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn">
                            <img src="{{ asset('svg/delete.svg') }}" height="24px" width="24px">
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $clients->links()}}
    {{-- Because she competes with no one, no one can compete with her. --}}
</div>
