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
            <h1>Nouveau Client</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('clients.store') }}" method="post">
                @csrf
                <div class="row fw-bold">
                    <div class="form-group col-md-4">
                        <label for="fullname">Nom et Prénoms</label>
                        <input type="text" name="fullname" id="fullname" class="form-control @error('fullname') is-invalid @enderror">
                        @error('fullname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="passport">Passeport</label>
                        <input type="text" name="passport" id="passport" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="num_license">Permis de conduire</label>
                        <input type="text" name="num_license" id="num_license" class="form-control">
                    </div>
                </div>
                <div class="row fw-bold">
                    <div class="form-group col-md-4">
                        <label for="cni">Carte d'identité</label>
                        <input type="text" name="cni" id="cni" class="form-control ">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone1">Contact 1</label>
                        <input type="text" name="phone1" id="phone1" class="form-control @error('phone1') is-invalid @enderror">
                        @error('phone1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone2">Contact 2</label>
                        <input type="text" name="phone2" id="phone2" class="form-control">
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
