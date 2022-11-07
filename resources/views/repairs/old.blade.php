@extends('layouts.adminlte')

@section('content')
    @if (session()->has('message'))
        <div class="{{ session()->get('class') }}">{{ session()->get('message') }}</div>
    @endif
    <div class="card mx-2 my-2">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4"><h1>Il y a plus de six(6) mois</h1></div>
                <div class="col-md-7"></div>
                <div class="col-md-1">
                    <a href="{{ route('repairs.create') }}" class="btn btn-success fw-bold">NOUVEAU</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-hover table-head-fixed">
                <thead>
                <tr>
                    <th>Référence</th>
                    <th>Clients</th>
                    <th>Catégories</th>
                    <th>Nombre de jours</th>
                    <th>Enlèvement</th>
                    <th>Lieu de dépôt</th>
                    <th>Statut</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
                </thead>
                @foreach ($repairs as $repair)
                    <tr>
                        <td><a href="{{ route('repairs.invoice', $repair->id) }}" class="btn btn-link">{{ $repair->reference }}</a></td>
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
                            @if(App\Helpers\Helper::userVerification(['gerant', 'caissiere']))
                            <a href="{{ route('repairs.payment', $repair->id) }}" class="btn">
                                <img src="{{ asset('svg/paiement.svg') }}" alt="Payer" height="20" width="20">
                            </a>
                            <a href="{{ route('repairs.edit', $repair->id) }}" class="btn">
                                <img src="{{ asset('svg/modify.svg') }}" alt="Modifier" height="20" width="20">
                            </a>
                            @endif
                                @if(\App\Helpers\Helper::userVerification(['gerant']))
                                    <form method="post" action="{{route('repairs.destroy')}}">
                                        @csrf
                                        <input type="hidden" name="id" value={{$repair->id}}>
                                        <button class="btn" type="submit" onclick="return confirm('Vous êtes sûrs?')">
                                            <img src="{{asset('svg/delete.svg')}}" height="20" width="20" alt="Supprimer">
                                        </button>
                                    </form>
                                @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {{-- The Master doesn't talk, he acts. --}}
    </div>

@endsection
