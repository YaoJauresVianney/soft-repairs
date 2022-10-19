@extends('layouts.adminlte')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Nouvelle Transaction</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('transactions.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="type">Type de transaction</label>
                        <select name="type" id="type" class="form-control">
                            <option value="income">Entrée</option>
                            <option value="outcome">Sortie</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="amount">Montant</label>
                        <input type="number" name="amount" id="amount" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="way_of">Nature de la transaction</label>
                        <select name="way_of" id="way_of" class="form-control">
                            <option value="ESPECES">Espèces</option>
                            <option value="CHEQUE">Cheque</option>
                            <option value="AUTRES">Autres</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea name="desc" id="desc" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-4"></div>
                <div class="col-md-1"><input type="submit" class="btn btn-success" value="ENREGISTRER"></div>
            </div>
        </form>
    </div>
</div>
@endsection
