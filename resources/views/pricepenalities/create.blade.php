@extends('layouts.adminlte')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Nouvelle pénalité</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('pricepenalities.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="penality_per_day">Catégorie client</label>
                        <select name="vehiclecategory_id" id="vehiclecategory_id" class="form-control">
                            @foreach ($vehicleCategories as $vehicleCategory)
                                <option value={{ $vehicleCategory->id}}>{{ $vehicleCategory->fullname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="penality_per_day">Opération</label>
                        <select name="peopletype_id" id="peopletype_id" class="form-control">
                            @foreach ($peopletypes as $peopletype)
                                <option value="{{ $peopletype->id }}">{{ $peopletype->label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="penality_per_day">Montant</label>
                        <input type="number" class="form-control" name="penality_per_day" id="penality_per_day">
                    </div>
                </div>
                <div class="row fw-bold mt-1">
                    <div class="col-md-4"></div>
                    <div class="col-md-2"><input type="submit" value="ENREGISTRER" class="btn btn-success"></div>
                    <div class="col-md-3"><a href="{{ route('pricepenalities.index') }}" class="btn btn-primary">ANNULER</a></div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#vehiclecategory_id').select2()
        })
        $(document).ready(function () {
            $('#peopletype_id').select2()
        })
    </script>
@endpush
