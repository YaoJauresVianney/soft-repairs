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
            <form action="{{route('criterias.update')}}" method="post">
                @csrf
                <input type="hidden" name="id" value={{$criteria->id}}>
                <div class="row">
                    <div class="col-md-5 form-group">
                        <label class="fw-bold">Code</label>
                        <input type="text" class="form-control" name="code" value="{{$criteria->code}}">
                    </div>
                    <div class="col-md-5 form-group">
                        <label class="fw-bold">Libellé</label>
                        <input type="text" class="form-control" name="label" value="{{$criteria->label}}">
                    </div>
                    <div class="col-md-2 form-group">
                        <label class="fw-bold">Activé?</label>
                        <input type="checkbox" class="form-control" name="is_enabled" @if($criteria->is_enabled) checked @endif>
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
