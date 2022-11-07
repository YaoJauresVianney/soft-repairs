@extends('layouts.adminlte')

@section('content')


    <div class="card mx-2 my-2">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4"><h1>Utilisateurs</h1></div>
                <div class="col-md-7"></div>
                <div class="col-md-1">
                    <a href="{{route('users.create')}}" class="btn btn-success fw-bold">NOUVEAU</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-head-fixed table-hover" id="example2">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>E-mail</th>
                    <th>Localisation</th>
                    <th>Téléphone</th>
                    <th>Rôle</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->location }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->role }}</td>
                        <td><input type="checkbox" class="form-check" {{ $user->is_enabled == true ? 'checked' : ''}} disabled></td>
                        <td class="d-flex">
                            @if(\App\Helpers\Helper::userVerification(['gerant']))
                            <a href="{{route('users.edit', $user->id)}}" class="btn"><img src="{{ asset('svg/modify.svg') }}" height="20" width="20" alt="Modifier"></a>
                            <form method="post" action="{{route('users.destroy')}}">
                                @csrf
                                <input type="hidden" name="id" value={{$user->id}}>
                                <button type="submit" class="btn" onclick="return confirm('Etes vous sûrs?')"><img src="{{asset('svg/delete.svg')}}" height="20" width="20"></button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
