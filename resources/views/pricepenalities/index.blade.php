@extends('layouts.adminlte')

@section('content')
    @if(session()->has('message'))
        <div class="{{ session()->get('class') }}">{{ session()->get('message') }}</div>
    @endif

    <div class="card mx-2 my-2">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4"><h1>Frais de fourrière</h1></div>
                <div class="col-md-7"></div>
                <div class="col-md-1">
                    <a href="{{ route('pricepenalities.create') }}" class="btn btn-success fw-bold">NOUVEAU</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-head-fixed table-hover" id="example2">
                <thead>
                <tr>
                    <th>Catégorie véhicule</th>
                    <th>Type de Client</th>
                    <th>Montant</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($pricepenalities as $pricepenality)
                    <tr>
                        <td>{{ $pricepenality->vehiclecategory->fullname }}</td>
                        <td>{{ $pricepenality->peopletype->label }}</td>
                        <td>{{ $pricepenality->penality_per_day }}</td>
                        <td class="d-flex">
                            @if(\App\Helpers\Helper::userVerification(['gerant']))
                            <a href="{{ route('pricepenalities.edit', $pricepenality->id) }}" class="btn"><img src="{{ asset('svg/modify.svg') }}" alt="Modifier" height="20" width="20"></a>
                            <form method="post" action="{{route('pricepenalities.index')}}">
                                @csrf
                                <input type="hidden" name="id" value={{$pricepenality->id}}>
                                <button type="submit" class="btn" onclick="return confirm('Etes vous sûrs?')"><img src="{{ asset('svg/delete.svg') }}" alt="Supprimer" height="20" width="20"></button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection
