@extends('layouts.adminlte')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Modifier {{ $peopletype->code . '-' . $peopletype->id }}</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('peopletypes.update') }}" method="post">
            @csrf
            <input type="hidden" name="id" value={{ $peopletype->id }}>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ $peopletype->code }}">
                        @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label">Titre</label>
                        <input type="text" name="label" id="label" class="form-control @error('label') is-invalid @enderror" value="{{ $peopletype->label }}">
                        @error('label')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="is_enabled">Activé?</label>
                        <input type="checkbox" name="is_enabled" class="form-check" {{ $peopletype->is_enabled == 1 ? 'checked' : '' }}>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4"><input type="submit" value="ENREGISTRER" class="btn btn-success"></div>
            </div>
        </form>
    </div>
</div>
@endsection
