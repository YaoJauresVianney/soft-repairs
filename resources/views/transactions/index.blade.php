@extends('layouts.adminlte')

@section('content')


    <div class="card mx-2 my-2">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4"><h1>Entrées & Sorties</h1></div>
                <div class="col-md-7"></div>
                <div class="col-md-1">
                    <a href="{{ route('transactions.create') }}" class="btn btn-success fw-bold">NOUVEAU</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-head-fixed" id="example2">
                <thead>
                <tr>
                    <td>Date</td>
                    <td>Numéro Transaction</td>
                    <td>Type</td>
                    <td>Description</td>
                    <td>Amount</td>
                    <td>Way_of</td>
                    <td>Actions</td>
                </tr>
                </thead>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{!! gmdate('d-m-Y', strtotime($transaction->created_at)) !!}</td>
                        <td>{{ $transaction->num_transaction }}</td>
                        <td>
                            @if($transaction->type == 'income')
                                <span class="alert alert-success">Entrée</span>
                            @elseif($transaction->type == 'outcome')
                                <span class="alert alert-warning">Dépense</span>
                            @else
                                <span class="alert alert-danger">Inconnu</span>
                            @endif
                        </td>
                        <td>{{ $transaction->desc }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->way_of }}</td>
                        <td class="d-flex">
                            @if(\Illuminate\Support\Facades\Auth::user()->role == 'gerant')
                            <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn">
                                <img src="{{ asset('svg/modify.svg') }}" alt="Modifier" height="20" width="20">
                            </a>
                            <form method="post" action="{{route('transactions.destroy')}}">
                                @csrf
                                <input type="hidden" name="id" value={{$transaction->id}}>
                                <button type="submit" class="btn" onclick="return confirm('Etes vous sûrs?')"><img src="{{ asset('svg/delete.svg') }}" alt="Supprimer" height="20" width="20"></button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>

@endsection
