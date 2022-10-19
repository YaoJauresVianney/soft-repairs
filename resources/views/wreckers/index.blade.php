@extends('layouts.adminlte')

@section('content')
    @if (session()->has('msg'))
        <div class="{{ session()->get('class') }}">{{ session()->get('msg') }}</div>
    @endif

    <div class="card mx-2 my-2">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4"><h1>Liste des dépanneuses</h1></div>
                <div class="col-md-7"></div>
                <div class="col-md-1">
                    <a href="{{ route('wreckers.create') }}" class="btn btn-success fw-bold">NOUVEAU</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-head-fixed table-hover" id="example2">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Immatriculation</th>
                        <th>label</th>
                        <th>Actif?</th>
                        <th>Carte grise?</th>
                        <th>Visite technique</th>
                        <th>Carte de transport</th>
                        <th>Carte de stationnement</th>
                        <th>Autorisation de remorquage</th>
                        <th>Patente</th>
                        <th>Assurance</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($wreckers as $wrecker)
                    <tr>
                        <td>{{ $wrecker->code }}</td>
                        <td>{{ $wrecker->car_imm }}</td>
                        <td>{{ $wrecker->label }}</td>
                        <td>
                            @if($wrecker->is_enabled)
                                <div class="alert alert-success">Oui</div>
                            @else
                                <div class="alert alert-danger">Non</div>
                            @endif
                        </td>
                        <td>
                            @if($wrecker->gray_card)
                                <div class="alert alert-success">Oui</div>
                            @else
                                <div class="alert alert-danger">Non</div>
                            @endif
                        </td>
                        <td>
                            {!! $wrecker->technical_visit !!} -
                            <div class="{{ $wrecker->afterOrBefore($wrecker->technical_visit)['class'] }}">{{ $wrecker->differenceBetween()["technical_visit"]["year"] }} An(s) {{ $wrecker->differenceBetween()["technical_visit"]["month"] }} Mois {{ $wrecker->differenceBetween()["technical_visit"]["day"] }} jour(s)</div>
                        </td>
                        <td>{!! $wrecker->transport_card !!} -
                            <div class="{{ $wrecker->afterOrBefore($wrecker->transport_card)['class'] }}">{{ $wrecker->differenceBetween()["transport_card"]["year"] }} An(s) {{ $wrecker->differenceBetween()["transport_card"]["month"] }} Mois {{ $wrecker->differenceBetween()["transport_card"]["day"] }} jour(s)</div></td>
                        <td>{!! $wrecker->parking_card !!} -
                            <div class="{{ $wrecker->afterOrBefore($wrecker->parking_card)['class'] }}">{{ $wrecker->differenceBetween()["parking_card"]["year"] }} An(s) {{ $wrecker->differenceBetween()["parking_card"]["month"] }} Mois {{ $wrecker->differenceBetween()["parking_card"]["day"] }} jour(s)</div></td>
                        <td>{!! $wrecker->towing_authorization !!} -
                            <div class="{{ $wrecker->afterOrBefore($wrecker->towing_authorization)['class'] }}">{{ $wrecker->differenceBetween()["towing_authorization"]["year"] }} An(s) {{ $wrecker->differenceBetween()["towing_authorization"]["month"] }} Mois {{ $wrecker->differenceBetween()["towing_authorization"]["day"] }} jour(s)</div></td>
                        <td>{!! $wrecker->tax !!} -
                            <div class="{{ $wrecker->afterOrBefore($wrecker->tax)['class'] }}">{{ $wrecker->differenceBetween()["tax"]["year"] }} An(s) {{ $wrecker->differenceBetween()["tax"]["month"] }} Mois {{ $wrecker->differenceBetween()["tax"]["day"] }} jour(s)</div></td>
                        <td>{!! $wrecker->insurance !!} -
                            <div class="{{ $wrecker->afterOrBefore($wrecker->insurance)['class'] }}">{{ $wrecker->differenceBetween()["insurance"]["year"] }} An(s) {{ $wrecker->differenceBetween()["insurance"]["month"] }} Mois {{ $wrecker->differenceBetween()["insurance"]["day"] }} jour(s)</div></td>
                        <td class="d-flex">
                            <a href="{{ route('wreckers.edit', $wrecker->id) }}" class="btn"><img src="{{ asset('svg/modify.svg') }}" alt="Modifier" height="20" width="20"></a>
                            <form method="post" action="{{route('wreckers.destroy')}}">
                                @csrf
                                <input type="hidden" name="id" value={{$wrecker->id}}>
                                <button class="btn" type="submit" onclick="return confirm('Etes vous sûrs?')"><img src="{{ asset('svg/delete.svg') }}" alt="Supprimer" height="20" width="20"></button>
                            </form>
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
