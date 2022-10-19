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
        <div class="card-header"><h2>NOUVEL UTILISATEUR</h2></div>
        <div class="card-body">
            <form method="post" action="{{route('users.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label>Nom</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label>Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                        @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label>Contact</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone">
                        @error('phone')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label>Rôle</label>
                        <select class="form-control" name="role" id="select2s">
                            <option value="facturier">Facturier</option>
                            <option value="caissiere">caissiere</option>
                            <option value="comptable">comptable</option>
                            <option value="gerant">gerant</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>Password</label>
                        <input type="password" class="form-control @error('phone') is-invalid @enderror" name="password">
                        @error('password')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <label for="password-confirm">Confirmez mot de passe</label>
                        <input id="password_confirmed" type="password" class="form-control" name="password_confirmed" required autocomplete="new-password">
                        @error('password_confirmed')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>Localisation</label>
                        <select class="form-control" name="location" id="select_location">
                            <option value="abidjan" >Abidjan - Yopougon</option>
                            <option value="anani">Abidjan - Anani</option>
                            <option value="ndouci">N'Douci</option>
                            <option value="nzianoua">N'Zianoua</option>
                            <option value="Elibou">Elibou</option>
                            <option value="yamoussoukro">Yamoussoukro</option>
                            <option value="agou">Agou</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <label>Activé?</label>
                        <input type="checkbox" class="form-control" name="is_enabled" >
                    </div>
                </div>
                <div class="row">
                    <div class="offset-10"><button type="submit" class="btn btn-success">ENREGISTRER</button></div>
                </div>
                </form>
    </div>
@endsection

