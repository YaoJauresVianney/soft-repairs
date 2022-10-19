<div>
    <div>
        <label for="query" class="sr-only">Recherche</label>
        <input type="text" wire:model="query" id="query" class="form-control">
    </div>
    <table class="table table-bordered">
        <thead class="table-success">
            <tr>
                <th>Client</th>
                <th>Véhicule</th>
                <th>Marque & Immatriculations</th>
                <th>Date enlèvement</th>
                <th>Lieu d'enlèvement</th>
                <th>Motif</th>
                <th>Objectif de la réclamations</td>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($complaints as $complaint)
                <tr>
                    <td>{{ $complaint->client->fullname }}</td>
                    <td>{{ $complaint->vehicle_rights }}</td>
                    <td>{{ $complaint->brand }} - {{ $complaint->car_imm }}</td>
                    <td>{{ $complaint->date_getting }}</td>
                    <td>{{ $complaint->place_getting }}</td>
                    <td>{{ $complaint->reasons }}</td>
                    <td>{{ $complaint->goals }}</td>
                    <td>
                        <a href="{{ route('complaints.edit', $complaint->id) }}"><img src="{{ asset('svg/modify.svg') }}" alt="Modifier" height="20" width="20"></a>
                        <a href="{{ route('complaints.destroy', $complaint->id) }}"><img src="{{ asset('svg/delete.svg') }}" alt="Modifier" height="20" width="20"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $complaints->links() }}
</div>
