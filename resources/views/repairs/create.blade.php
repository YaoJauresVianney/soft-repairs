@extends('layouts.adminlte')

@section('content')
    <div class="card fw-bold">
        <div class="card-header">
            <h1>Référence {{ $reference }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('repairs.store') }}" method="post">
                @csrf
                <input type="hidden" name="reference" value="{{ $reference }}">
                <div class="card">
                    <div class="card-header">
                        <h2>Véhicule</h2>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="">Date enlèvement</label>
                                <input type="date" name="date_getting" id="date_getting" class="form-control @error('date_getting') 'is-invalid' @enderror" >
                                @error('date_getting')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">Heure enlèvement</label>
                                <input type="time" name="hour_getting" id="hour_getting" class="form-control @error('hour_getting') is-invalid @enderror" >
                                @error('hour_getting')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">Lieu enlèvement</label>
                                <input type="text" name="place_getting" id="place_getting" class="form-control @error('place_getting') is-invalid @enderror" >
                                @error('place_getting')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="park">Lieu de dépôt</label>
                                <select class="form-control @error('park') is-invalid @enderror" id="slct" name="park" >
                                    <option value="PARC 1">PARC 1</option>
                                    <option value="PARC 2">PARC 2</option>
                                    <option value="PARC 3">PARC 3</option>
                                    <option value="PARC 3 PK 27">PARC 3 PK 27</option>
                                    <option value="PARC 4">PARC 4</option>
                                    <option value="ANANI">ANANI</option>
                                    <option value="HP">HORS PARC</option>
                                    <option value="ELIBOU">ELIBOU</option>
                                    <option value="YAMOUSSOUKRO">YAMOUSSOUKRO</option>
                                    <option value="N'DOUCI">N'DOUCI</option>
                                    <option value="N'ZIANOUA">N'ZIANOUA</option>
                                    <option value="AGOU">AGOU</option>
                                </select>
                                @error('park')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="">Marque</label>
                                <input type="text" name="car_brand" id="car_brand" class="form-control @error('car_brand') is-invalid @enderror" >
                                @error('car_brand')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">Catégorie véhicule</label>
                                <select class="form-control @error('vehiclecategory_id') is-invalid @enderror" id="vehiclecategory_id" name="vehiclecategory_id" >

                                    <option value="">-- Catégories --</option>

                                    @foreach($categories as $category)

                                        <option value="{{ $category->id }}">{{ $category->getFullnameAttribute('') }}</option>

                                    @endforeach

                                </select>
                                @error('vehiclecategory_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="">Immatriculation</label>
                                <input type="text" name="car_imm" id="car_imm" class="form-control @error('car_imm') is-invalid @enderror" >
                                @error('car_imm')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label for="">Nombre d'heures</label>
                                <input type="number" name="work_time" class="form-control" value=1 >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="wrecker_id">Dépanneuse</label>
                                <select class="form-control @error('wrecker_id') is-invalid @enderror" id="wrecker_id" name="wrecker_id" >

                                    <option value="">-- Dépanneuses --</option>

                                    @foreach($wreckers as $wrecker)

                                        <option value="{{ $wrecker->id }}">{{ $wrecker->getFullnameAttribute('') }}</option>

                                    @endforeach

                                </select>
                                @error('wrecker_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <label for="peopletype_id">Type de client</label>
                                <select class="form-control @error('peopletype_id') is-invalid @enderror" id="peopletype_id" name="peopletype_id" >

                                    <option value="">-- Type de client --</option>

                                    @foreach($peopleTypes as $peopleType)

                                        <option value="{{ $peopleType->id }}">{{ $peopleType->label }}</option>

                                    @endforeach

                                </select>
                                @error('peopletype_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="reasons">Motif</label>
                                <textarea name="reasons" id="reasons" class="form-control @error('reasons') is-invalid @enderror" ></textarea>
                                @error('reasons')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h2>Client</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="client_id">Choisir un client</label>
                                <select name="client_id" id="client_id" class="form-control @error('client_id') is-invalid @enderror">
                                    <option value="">--Choisir un client--</option>
                                    @foreach ($clients as $client)
                                        <option value={{ $client->id }}>{{ $client->getFullNamePhoneAttribute('') }}</option>
                                    @endforeach
                                </select>
                                @error('client_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 card pb-1">
                                <label for="fullname">Nom & prénoms du client</label>
                                <input type="text" name="fullname" id="fullname" class="form-control @error('fullname') is-invalid @enderror">
                                @error('fullname')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <label for="cni">Numéro cni</label>
                                <input type="text" name="cni" id="cni" class="form-control">
                                <label for="num_license">Numéro permis de conduire</label>
                                <input type="text" name="num_license" id="num_license" class="form-control">
                                <label for="passport">Passeport</label>
                                <input type="text" name="passport" id="passport" class="form-control">
                                <label for="phone1">Contact 1</label>
                                <input type="text" name="phone1" id="phone1" class="form-control @error('phone1') is-invalid @enderror">
                                @error('phone1')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                <label for="phone2">Contact 2</label>
                                <input type="text" name="phone2" id="phone2" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h2>Inventaire</h2>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <table class="table table-bordered criteria">
                                <thead>
                                <th></th>
                                <th>Oui</th>
                                <th width="25%">Nombre</th>
                                <th>Etat et observations</th>
                                </thead>
                                <tbody>
                                @if (!isset($repair))
                                    @foreach ($criterias as $c)
                                        <tr>
                                            <td>{{ $c->label }}</td>
                                            <td><input type="checkbox" name="yes[{{$c->id}}]" id=""></td>
                                            <td><input type="number" name="num[{{$c->id}}]" class="form-control"></td>
                                            <td><input type="text" name="comments[{{$c->id}}]" class="form-control"></td>
                                        </tr>
                                    @endforeach
                                @else
                                    @foreach ($repair->criterias as $c)
                                        <tr>
                                            <td>{{ $c->label }}</td>
                                            <td><input type="checkbox" name="yes[{{$c->id}}]" value={{$c->pivot->yes}}></td>
                                            <td><input type="number" name="num[{{$c->id}})" class="form-control" value={{$c->pivot->number}}></td>
                                            <td><input type="text" name="comments[{{$c->id}}]" class="form-control" value={{$c->pivot->comments}}></td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4 text-center">
                                <label for="" class="checkbox-inline">
                                    <input type="hidden" name="luggage" value=0>
                                    <input type="checkbox" value=1 name="luggage"> Liste des bagages jointes ?
                                </label>
                            </div>
                            <div class="form-group col-md-4 text-center">
                                <label for="" class="checkbox-inline">
                                    <input type="hidden" name="car_license" value=0>
                                    <input type="checkbox" value=1 name="car_licenses"> Papier de véhicule remis ?
                                </label>
                            </div>
                            <div class="form-group col-md-4 text-center">
                                <label for="" class="checkbox-inline">
                                    <input type="hidden" name="car_keys" value=0>
                                    <input type="checkbox" value=1 name="car_keys"> Clés du véhicule remises ?
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card fw-bold">
                    <div class="card-header">
                        <h2>Autres informations</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="kg">Nombre de kilogrammes emportés</label>
                                <input type="number" name="kg" id="kg" class="form-control" min="0">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exchanger">Echangeur</label>
                                <input type="text" name="exchanger" id="exchanger" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="counter">Décompte</label>
                                <input type="text" name="counter" id="counter" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="kms">Kms</label>
                                <input type="text" name="kms" id="kms" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="extension">Extension</label>
                                <input type="text" name="extension" id="extension" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="charge">Chargement</label>
                                <input type="text" name="charge" id="charge" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="pc">PC</label>
                                <input type="text" name="pc" id="pc" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="scope">Portée</label>
                                <input type="text" name="scope" id="scope" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tvs_place">TVS/Place</label>
                                <input type="text" name="tvs_place" id="tvs_place" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="others">Autres</label>
                                <textarea name="others" id="others" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row fw-bold">
                    <div class="col-md-1 mr-5"><input type="submit" value="ENREGISTRER" class="btn btn-success" onclick="confirm('Avez vous vérifiez les informations entrées?')"></div>
                    <div class="col-md-1 mr-3"><a href="{{ route('repairs.index') }}" class="btn btn-primary">ANNULER</a></div>
                    <div class="col-md-1">

                    </div>
                </div>
            </form>
            <form action="{{ route('repairs.showing') }}" method="post">
                @csrf
                <input type="submit" class="btn btn-secondary" value="APERCU">
            </form>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#peopletype_id').select2();
        });
        $(document).ready(function() {
            $('#wrecker_id').select2();
        })
        $(document).ready(function() {
            $('#vehiclecategory_id').select2();
        })
        $(document).ready(function() {
            $('#client_id').select2();
        })
        $(document).ready(function(){
            $('#slct').select2();
        })
    </script>
@endpush
