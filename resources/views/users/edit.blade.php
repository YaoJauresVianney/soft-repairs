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
        <div class="card-header"><h2>MODIFIER UTILISATEUR</h2></div>
        <div class="card-body">
            <form method="post" action="{{route('users.update')}}">
                    @csrf
                    <input type="hidden" name="id" value={{$user->id}}>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Nom</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" >
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Contact</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$user->phone}}">
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label>Rôle</label>
                            <select class="form-control @error('role') is-invalid @enderror" name="role" id="select2s">
                                <option value="facturier" {{$user->role == 'facturier' ? 'selected' : ''}}>Facturier</option>
                                <option value="caissiere" {{$user->role == 'caissiere' ? 'selected' : ''}}>caissiere</option>
                                <option value="comptable" {{$user->role == 'comptable' ? 'selected' : ''}}>comptable</option>
                                <option value="gerant" {{$user->role == 'gerant' ? 'selected' : ''}}>gerant</option>
                            </select>
                            @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="password_confirmed">Confirmez mot de passe</label>
                            <input id="password_confirmed" type="password" class="form-control @error('password_confirmed') is-invalid @enderror" name="password_confirmed" required autocomplete="new-password">
                            @error('password_confirmed')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Localisation</label>
                            <select class="form-control @error('name') is-invalid @enderror" name="location" id="select_location">
                                <option value="abidjan" {{$user->location == 'abidjan' ? 'selected' : ''}}>Abidjan - Yopougon</option>
                                <option value="anani" {{$user->location == 'anani' ? 'selected' : ''}}>Abidjan - Anani</option>
                                <option value="ndouci" {{$user->location == 'ndouci' ? 'selected' : ''}}>N'Douci</option>
                                <option value="nzianoua" {{$user->location == 'nzianoua' ? 'selected' : ''}}>N'Zianoua</option>
                                <option value="elibou" {{$user->location == 'Elibou' ? 'selected' : ''}}>Elibou</option>
                                <option value="yamoussoukro" {{$user->location == 'yamoussoukro' ? 'selected' : ''}}>Yamoussoukro</option>
                                <option value="agou" {{$user->location == 'agou' ? 'selected' : ''}}>Agou</option>
                            </select>
                            @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-1">
                            <label>Activé?</label>
                            <input type="checkbox" class="form-control @error('name') is-invalid @enderror" name="is_enabled" {{$user->is_enabled == 1 ? 'checked' : ''}}>
                            @error('is_enabled')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-10"><button type="submit" class="btn btn-success">ENREGISTRER</button></div>
                    </div>
                </form>
        </div>
@endsection
