@extends('layouts.adminlte')

@section('content')
    @if (session()->has('message'))
        <div class="{{ session()->get('class') }}">{{ session()->get('message') }}</div>
    @endif


<div class="card my-2 mx-2">
    <div class="card-header">
        <div class="row">
            <div class="col-md-4"><h1>Clients</h1></div>
            <div class="col-md-7"></div>
            <div class="col-md-1">
                <a href="{{ route('clients.create') }}" class="btn btn-success fw-bold">NOUVEAU</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="example2" class="table table-hover table-head-fixed">
            <thead>
                <tr>
                    <th>Nom & Prénoms</th>
                    <th>Nb. Factures</th>
                    <th>Numéro de CNI</th>
                    <th>Numéro Permis de Conduire</th>
                    <th>Numéro Passeport</th>
                    <th>Contact1</th>
                    <th>Contact 2</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td>{{ $client->fullname }}</td>
                    <td>{{ $client->repairs_count }}</td>
                    <td>{{ $client->cni }}</td>
                    <td>{{ $client->num_license }}</td>
                    <td>{{ $client->passport }}</td>
                    <td>{{ $client->phone1 }}</td>
                    <td>{{ $client->phone2 }}</td>
                    <td class="d-flex">
                        <a href="{{route('clients.repairs', $client->id)}}" class="btn"><img src="{{asset('img/list.png')}}" height="20" width="20" alt="Liste"></a>
                        <a href="{{route('clients.edit', $client->id)}}" class="btn"><img src="{{asset('svg/modify.svg')}}" height="20" width="20" alt="Modifier"></a>
                        <form method="post" action="{{route('clients.destroy')}}">
                            @csrf
                            <input type="hidden" name="id_client" value={{$client->id}}>
                            <button type="submit" class="btn" onclick="return confirm('Etes vous sûrs?')"><img src="{{asset('svg/delete.svg')}}" height="20" width="20" alt="Supprimer"></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
