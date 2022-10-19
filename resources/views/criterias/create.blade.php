@extends('layouts.adminlte')

@section('content')
    @if (session()->has('message'))
        <div class="{{ session()->get('class') }}">{{ session()->get('message') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h1>Nouveau critère d'inventaire</h1>
        </div>
        <div class="card-body">
            <form action="{{route('criterias.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-5 form-group">
                        <label class="fw-bold">Code</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" name="code">
                        @error('code')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-5 form-group">
                        <label class="fw-bold">Nom complet</label>
                        <input type="text" class="form-control @error('label') is-invalid @enderror" name="label">
                        @error('label')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 form-group">
                        <label class="fw-bold">Activé?</label>
                        <input type="checkbox" class="form-control" name="is_enabled">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-2">
                        <input type="submit" value="ENREGISTRER" class="btn btn-success m-5 fw-bold">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
