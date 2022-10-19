@extends('layouts.adminlte')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Nouveau tarif d'enlèvement</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('pricegettings.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="vehiclecategory_id">Catégorie véhicule</label>
                        <select name="vehiclecategory_id" id="vehiclecategory_id" class="form-control">
                            @foreach ($vehiclecategories as $vehiclecategory)
                                <option value={{ $vehiclecategory->id }}>{{ $vehiclecategory->fullname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="peopletype_id">Catégorie véhicule</label>
                        <select name="peopletype_id" id="peopletype_id" class="form-control">
                            @foreach ($peopletypes as $peopletype)
                                <option value={{ $peopletype->id }}>{{ $peopletype->label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="price_day">Prix Jour</label>
                        <input type="number" class="form-control" name="price_day">
                    </div>
                    <div class="col-md-6">
                        <label for="price_night">Prix Nuit</label>
                        <input type="number" class="form-control" name="price_night">
                    </div>
                </div>
                <input type="submit" value="Enregistrer" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection
