@extends('layouts.adminlte')

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Modification pénalité : {{ $pricepenality->code }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('pricepenalities.update') }}" method="post">
                @csrf
                <input type="hidden" name="id" value={{ $pricepenality->id }}>
                <div class="row">
                    <div class="col-md-6">
                        <select name="vehiclecategory_id" id="vehiclecategory_id" class="form-control">
                            @foreach ($vehicleCategories as $vehicleCategory)
                                @if ($vehicleCategory->id == $pricepenality->vehiclecategory_id)
                                <option value={{ $vehicleCategory->id}} selected>{{ $vehicleCategory->fullname }}</option>
                                @else
                                <option value={{ $vehicleCategory->id}}>{{ $vehicleCategory->fullname }}</option>
                                @endif
                            @endforeach
                        </select>
                        <select name="peopletype_id" id="peopletype_id" class="form-select m-5">
                            @foreach ($peopletypes as $peopletype)
                                @if ($peopletype->id === $pricepenality->peopletype_id)
                                <option value="{{ $peopletype->id }}" selected>{{ $peopletype->label }}</option>
                                @else
                                <option value="{{ $peopletype->id }}">{{ $peopletype->label }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="penality_per_day">Montant</label>
                        <input type="number" class="form-control" name="penality_per_day" id="penality_per_day" value={{ $pricepenality->penality_per_day }}>
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
