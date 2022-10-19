@extends('layouts.adminlte')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Nouvelle réclamation</h1>
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
            <form action="{{ route('complaints.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <label for="client_id">Client</label>
                        <select name="client_id" id="client_id" class="form-control @error('client_id') is-invalid @enderror">
                            @foreach ($clients as $client)
                                <option value={{ $client->id }}>{{ $client->fullname }}</option>
                            @endforeach
                        </select>
                        @error('client_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="vehicle_rights">Véhicule</label>
                        <input type="text" name="vehicle_rights" id="vehicle_rights" class="form-control @error('vehicle_rights') is-invalid @enderror">
                        @error('vehicle_rights')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="brand">Marque</label>
                        <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" id="brand">
                        @error('brand')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="car_imm">Immatriculation</label>
                        <input type="text" name="car_imm" class="form-control @error('car_imm') is-invalid @enderror" id="car_imm">
                        @error('car_imm')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="date_getting">Date enlèvement</label>
                        <input type="date" class="form-control @error('date_getting') is-invalid @enderror" name="date_getting" id="date_getting">
                        @error('date_getting')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="place_getting">Lieu d'enlèvement</label>
                        <input type="text" name="place_getting" id="place_getting" class="form-control @error('place_getting') is-invalid @enderror">
                        @error('place_getting')
                            <div class="invalida-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label for="state">Payé?</label>
                        <input type="checkbox" name="state" class="form-check">
                    </div>
                    <div class="col-md-5">
                        <label for="reasons">Motif</label>
                        <textarea name="reasons" id="reasons" class="form-control @error('reasons') is-invalid @enderror"></textarea>
                        @error('reasons')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-5">
                        <label for="goals">But de la réclamation</label>
                        <textarea name="goals" id="goals" class="form-control @error('goals') is-invalid @enderror"></textarea>
                        @error('goals')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2"><button type="submit" class="btn btn-success mt-1">ENREGISTRER</button></div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#client_id').select2()
        })
    </script>
@endpush
