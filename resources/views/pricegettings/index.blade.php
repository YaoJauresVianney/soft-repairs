@extends('layouts.adminlte')

@section('content')
    @if (session()->has('message'))
        <div class="{{ session()->get('class') }}">{{ session()->get('message') }}</div>
    @endif

    <div class="card mx-2 my-2">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4"><h1>Tarifs d'enlèvement</h1></div>
                <div class="col-md-7"></div>
                <div class="col-md-1">
                    <a href="{{ route('pricegettings.create') }}" class="btn btn-success fw-bold">NOUVEAU</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-head-fixed table-hover" id="example2">
                <thead>
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
                        <td class="d-flex">
                            @if(\App\Helpers\Helper::userVerification(['gerant']))
                            <a href="{{ route('pricegettings.edit', $pricegetting->id) }}" class="btn">
                                <img src="{{ asset('svg/modify.svg') }}" alt="modifier" height="20" width="20">
                            </a>
                            <form method="post" action="{{route('pricegettings.destroy')}}">
                                @csrf
                                <input type="hidden"name="id" value={{$pricegetting->id}}>
                                <button type="submit" class="btn" onclick="return confirm('Etes vous sûrs?')"><img src="{{ asset('svg/delete.svg') }}" alt="Supprimer" height="20" width="20"></button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>

    </div>

@endsection
