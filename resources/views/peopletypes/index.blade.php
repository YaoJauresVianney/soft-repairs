@extends('layouts.adminlte')

@section('content')
    @if (session()->has('message'))
        <div class="{{ session()->get('class') }}">{{ session()->get('message') }}</div>
    @endif

    <div class="card my-2 mx-2">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4"><h1>Catégories de client</h1></div>
                <div class="col-md-7"></div>
                <div class="col-md-1">
                    <a href="{{ route('peopletypes.create') }}" class="btn btn-success fw-bold">NOUVEAU</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-head-fixed table-hover" id="example2">
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Label</th>
                    <th>Actif?</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($peopletypes as $peopletype)
                    <tr>
                        <td>{{ $peopletype->code }}</td>
                        <td>{{ $peopletype->label }}</td>
                        <td><input type="checkbox" {{ $peopletype->is_enabled == 1 ? 'checked' : '' }} disabled></td>
                        <td class="d-flex">
                            <a href="{{ route('peopletypes.edit', $peopletype->id) }}" class="btn"><img src="{{ asset('svg/modify.svg') }}" alt="Modifier" height="20" width="20"></a>
                            <form action="{{route('peopletypes.destroy')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value={{$peopletype->id}}>
                                <button class="btn" type="submit" id="del_button" onclick="return confirm('Etes vous sûrs?')"><img src="{{ asset('svg/delete.svg') }}" alt="Supprimer" height="20" width="20"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>

    </div>


@endsection
