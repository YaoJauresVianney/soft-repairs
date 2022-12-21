@extends('layouts.adminlte')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Récapitulatif</h2>
        </div>
        <div class="card-body">
            <p>
                <strong>Reference:</strong>{{ $contents->reference }}<br>
                <strong>Immatriculation: </strong>{{ $contents->car_imm }}<br>
                <strong>Marque:</strong>{{ $contents->car_brand }}
                <strong>Type de client:</strong>{{ $contents->peopletype_id }}<br>
            </p>
        </div>
    </div>
@endsection
