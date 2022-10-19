@extends('layouts.adminlte')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Modifier dépanneuse {{ $wrecker->id }}</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('wreckers.update') }}" method="post">
            @csrf
            <input type="hidden" name="id" value={{$wrecker->id}}>
            <div class="row">
                <div class="col-md-1">
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{$wrecker->code}}">
                        @error('code')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="car_imm">Immatriculation</label>
                        <input type="text" name="car_imm" id="car_imm" class="form-control @error('car_imm') is-invalid @enderror" value="{{$wrecker->car_imm}}">
                        @error('car_imm')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label for="is_enabled">Activé?</label>
                        <input type="checkbox" name="is_enabled" class="form-control @error('is_enabled') is-invalid @enderror" {{$wrecker->is_enabled == 1 ? 'checked' : ''}}>
                        @error('is_enabled')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <label for="gray_card">Carte grise?</label>
                        <input type="checkbox" name="gray_card" id="gray_card" class="form-control @error('gray_card') is-invalid @enderror" {{$wrecker->gray_card == 1 ? 'checked' : ''}}>
                        @error('gray_card')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="technical_visit">Visite technique</label>
                        <input type="date" name="technical_visit" class="form-control @error('technical_visit') is-invalid @enderror" value="{{substr($wrecker->technical_visit, 0, -9)}}">
                        @error('technical_visit')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="parking_card">Carte de stationnement</label>
                        <input type="date" name="parking_card" class="form-control @error('parking_card') is-invalid @enderror" value="{{substr($wrecker->parking_card, 0, -9)}}">
                        @error('parking_card')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="towing_authorization">Autorisation de remorquage</label>
                        <input type="date" name="towing_authorization" class="form-control @error('towing_authorization') is-invalid @enderror" value="{{substr($wrecker->towing_authorization, 0, -9)}}">
                        @error('towing_authorization')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tax">Patente</label>
                        <input type="date" name="tax" class="form-control @error('tax') is-invalid @enderror" value="{{$wrecker->tax}}">
                        @error('tax')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="insurance">Assurance</label>
                        <input type="date" name="insurance" class="form-control @error('insurance') is-invalid @enderror" value="{{$wrecker->insurance}}">
                        @error('insurance')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="label">Type</label>
                        <select name="label" id="select2s" class="form-control  @error('label') is-invalid @enderror">
                            <option value="PETIT PORTEUR" {{$wrecker->label == 'PETIT PORTEUR' ? 'selected' : ''}}>Petit Porteur</option>
                            <option value="GROS PORTEUR" {{$wrecker->label == 'GROS PORTEUR' ? 'selected' : ''}}>Gros Porteur</option>
                        </select>
                        @error('label')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-7"></div>
                <div class="col-md-1"><input type="submit" value="ENREGISTRER" class="btn btn-success"></div>
            </div>
        </form>
    </div>
</div>
@endsection
