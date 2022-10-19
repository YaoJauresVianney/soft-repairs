@extends('layouts.adminlte')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Nouvelle catégorie de client</h1>
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
        <form action="{{ route('peopletypes.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror">
                        @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="label">Titre</label>
                        <input type="text" name="label" id="label" class="form-control @error('label') is-invalid @enderror">
                        @error('label')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="is_enabled">Activé?</label>
                        <input type="checkbox" name="is_enabled" class="form-check">
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
