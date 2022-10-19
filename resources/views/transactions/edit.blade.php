@extends('layouts.adminlte')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Modification transaction : {{ $transaction->num_transaction }}</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('transactions.update') }}" method="post">
            @csrf
            <input type="hidden" name="id" value={{ $transaction->id }}>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="type">Type de transaction</label>
                        <select name="type" id="type" class="form-control">
                            <option value="income" {{ $transaction->type == 'income' ? 'selected' : '' }}>Entrée</option>
                            <option value="outcome" {{ $transaction->type == 'outcome' ? 'selected' : '' }}>Sortie</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="amount">Montant</label>
                        <input type="number" name="amount" id="amount" class="form-control" value={{ $transaction->amount }}>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="way_of">Nature de la transaction</label>
                        <select name="way_of" id="way_of" class="form-control">
                            <option value="ESPECES" {{ $transaction->way_of == 'ESPECES' ? 'selected' : ''}}>Espèces</option>
                            <option value="CHEQUE" {{ $transaction->way_of== 'CHEQUE' ? 'selected' : '' }}>Cheque</option>
                            <option value="AUTRES" {{ $transaction->way_of== 'AUTRES' ? 'selected' : '' }}>Autres</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea name="desc" id="desc" cols="30" rows="10" class="form-control">{{ $transaction->desc }}</textarea>
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
