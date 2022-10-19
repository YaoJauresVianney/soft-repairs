@extends('layouts.adminlte')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Paiement de la facture : {{ $repair->reference }}</h1>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="card-body">
            <form action="{{ route('repairs.pay') }}" method="post">
                @csrf
                <input type="hidden" name="repair_id" value={{ $repair->id }}>
                <div class="row">
                    <div class="col-md-6">
                        <label for="way_of">Type de paiement:</label>
                        <input type="text" name="way_of" id="way_of" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="type">Montant:<br> <h3>{{ $repair->sumDays()+$repair->tva() - $repair->reduction }} FCFA</h3></label>
                        <input type="hidden" name="amount" id="amount" class="form-control" value={{ $repair->sumDays()+$repair->tva() - $repair->reduction }}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="num_transaction">Numéro de transaction</label>
                        <input type="text" class="form-control" name="num_transaction" id="num_transaction">
                    </div>
                    <div class="col-md-6">
                        <label for="type">Type de paiement:</label>
                        <select class="form-select" name="type" disabled>
                            <option value="income" selected>Entrée</option>
                            <option value="outcome">Dépense</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4 mt-5">
                        <input type="submit" value="Payer" class="btn btn-success">
                        <a href="" class="btn btn-secondary">Annuler</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
