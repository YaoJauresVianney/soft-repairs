@extends('layouts.adminlte')

@section('content')
    @if (session()->has('message'))
        <div class="{{ session()->get('class') }}">{{ session()->get('message') }}</div>
    @endif
    <div class="card mx-2 my-2">
        <div class="card-header">
            <div class="row">
                <h1>Factures payées</h1>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-head-fixed" id="example2">
                <thead>
                <tr>
                    <th>Référence</th>
                    <th>Clients</th>
                    <th>Catégories</th>
                    <th>Nombre de jours</th>
                    <th>Enlèvement</th>
                    <th>Lieu de dépôt</th>
                    <th>Date sortie</th>
                    <th>Statut</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
                </thead>
                @foreach ($repairs as $repair)
                    <tr>
                        <td><a href="{{ route('repairs.invoice', $repair->id) }}" target="_blank" class="btn btn-link">{{ $repair->reference }}</a></td>
                        <td>{{ $repair->client->fullname }}</td>
                        <td>
                    <span class="alert alert-default-info p-1">
                        {{$repair->peopletype->label}}
                    </span>
                            <br>
                            {{ $repair->vehiclecategory->fullname }}
                            <br>
                            {{ $repair->car_brand }} - {{ $repair->car_imm }}
                        </td>
                        <td class="text-center">{{ $repair->numberDays() }}</td>
                        <td>{!! gmdate('d-m-Y', strtotime($repair->date_getting)) !!} <br>
                            à {!! $repair->hour_getting !!} <br>
                            {!! $repair->place_getting !!}
                        </td>
                        <td>{{$repair->park}}</td>
                        <td>{{gmdate('d-m-Y', strtotime($repair->date_release))}}</td>
                        <td>
                            @if($repair->state == 'pending')
                                <div class="alert alert-success">En cours</div>
                            @else
                                <div class="alert alert-primary">Terminé</div>
                            @endif
                        </td>
                        <td>
                            @if($repair->reduction != 0)
                                <span style="text-decoration:line-through;">
                            {!! number_format($repair->sumDays()+$repair->tva(),0,'','.') !!} FCFA
                        </span>
                                <br>
                                <span style="color: #DB580D;font-weight: bold;">
                            {!! number_format(($repair->sumDays()+$repair->tva()) - $repair->reduction,0,'','.') !!} FCFA
                        </span>
                            @else
                                <span>
                            {!! number_format($repair->sumDays()+$repair->tva(),0,'','.') !!} FCFA
                        </span>
                            @endif

                        </td>
                        <td class="d-flex">
                            <a href="{{route('repairs.receipt', $repair->id)}}" target="_blank" class="btn">
                                <img src="{{asset('svg/recu.svg')}}" height="20" width="20" alt="Reçu">
                            </a>
                            <a href="{{route('repairs.invoice', $repair->id )}}" target="_blank" class="btn">
                                <img src="{{asset('svg/facture.svg')}}" height="20" width="20" alt="Facture">
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>


        {{-- The Master doesn't talk, he acts. --}}
    </div>

@endsection
