@extends('layouts.adminlte')

@section('content')
    @if (session()->has('message'))
        <div class="{{ session()->get('class') }}">{{ session()->get('message') }}</div>
    @endif

    <div class="card mx-2 my-2">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4"><h1>Réclamations</h1></div>
                <div class="col-md-7"></div>
                <div class="col-md-1">
                    <a href="{{ route('complaints.create') }}" class="btn btn-success fw-bold">NOUVEAU</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-head-fixed table-hover " id="example2">
                <thead>
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
                        <td class="d-flex">
                            <a href="{{ route('complaints.edit', $complaint->id) }}" class="btn"><img src="{{ asset('svg/modify.svg') }}" alt="Modifier" height="20" width="20"></a>
                            <form method="post" action="{{ route('complaints.destroy') }}">
                                @csrf
                                <input type="hidden" value={{$complaint->id}}>
                                <button type="submit" class="btn" onclick="return confirm('Etes vous sûrs?')"><img src="{{ asset('svg/delete.svg') }}" alt="Modifier" height="20" width="20"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
