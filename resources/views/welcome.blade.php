@extends('layouts.adminlte')

@section('content')
    <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="row">
            @if(Auth::user()->role=="caissiere")
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{!! $todayIncome !!}</h3>
                            <p>Ajouté aujourd'hui<br>dans la caisse</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contacts"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{!! $todayOutcome !!}</h3>
                            <p>Sortis aujourd'hui<br>de la caisse</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contacts"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-orange">
                        <div class="inner">
                            <h3>{{ number_format($todayIncome - $todayOutcome,0,'','.') }}</h3>
                            <p>Solde<br>de la caisse</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contacts"></i>
                        </div>
                    </div>
                </div>
            @endif

            @if(Auth::user()->role=="facturier")
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{!! $newClients !!}</h3>
                            <p>Nouveaux clients <br>enregistrés</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contacts"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3>{!! $inParc !!}</h3>
                            <p>Véhicules <br>dans le parc auto</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-car"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <p>Total des Dépannages<br>enregistrés</p>
                            <h3>{!! $repairs !!}</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-cog-outline"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{!! $release !!}</h3>
                            <p>Véhicules <br>sortis aujourd'hui</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-document"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{!! $todayOutcome !!}</h3>
                            <p>Sortis aujourd'hui<br>de la caisse</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contacts"></i>
                        </div>
                    </div>
                </div>
            @endif

            @if(Auth::user()->role=="comptable")
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{!! $todayIncome !!}</h3>
                            <p>Ajouté aujourd'hui<br>dans la caisse</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contacts"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{!! $todayOutcome !!}</h3>
                            <p>Sortis aujourd'hui<br>de la caisse</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contacts"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{!! number_format($outcome,0,'','.') !!}</h3>
                            <p>Sorties <br>de la caisse</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-arrow-down-c"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{!! number_format($income,0,'','.') !!}</h3>
                            <p>Entrées <br>dans la caisse</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-arrow-up-c"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-orange">
                        <div class="inner">
                            <h3>{{ number_format($todayIncome - $todayOutcome,0,'','.') }}</h3>
                            <p>Solde<br>de la caisse</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contacts"></i>
                        </div>
                    </div>
                </div>
            @endif

            @if(Auth::user()->role=="gerant")
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{!! $newClients !!}</h3>
                            <p>Nouveaux clients <br>enregistrés</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-contacts"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3>{!! $inParc !!}</h3>
                            <p>Véhicules <br>dans le parc auto</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-car"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <p>Total des Dépannages<br>enregistrés</p>
                            <h3>{!! $repairs !!}</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-cog-outline"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{!! $release !!}</h3>
                            <p>Véhicules <br>sortis aujourd'hui</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-document"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>{!! number_format($todayIncome,0,'','.') !!}</h3>
                                    <p>Ajouté aujourd'hui<br>dans la caisse</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-arrow-up-b"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>{!! number_format($todayOutcome,0,'','.') !!}</h3>
                                    <p>Dépenses aujourd'hui<br>de la caisse</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-arrow-down-b"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xs-6">
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>{!! number_format($income,0,'','.') !!}</h3>
                                    <p>Total Entrées <br>dans la caisse</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-arrow-up-c"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>{!! number_format($outcome,0,'','.') !!}</h3>
                                    <p>Total Dépenses <br>de la caisse</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-arrow-down-c"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-orange">
                                <div class="inner">
                                    <h3>{{ number_format($todayIncome - $todayOutcome,0,'','.') }}</h3>
                                    <p>Solde<br>de la caisse</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-android-contacts"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        @if(Auth::user()->role=="gerant" && Auth::user()->role=="comptable")
            <div class="box box-primary">
                <div class="box-body">
                    <div class="col-lg-4 col-xs-12">
                        <canvas id="clients" width="100%" height="40px"></canvas>
                    </div>
                    <div class="col-lg-4 col-xs-12">
                        <canvas id="repairs" width="100%" height="40px"></canvas>
                    </div>
                    <div class="col-lg-4 col-xs-12">
                        <canvas id="soldes" width="100%" height="40px"></canvas>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
