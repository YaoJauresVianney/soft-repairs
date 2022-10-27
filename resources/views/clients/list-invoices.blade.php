<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facture Proforma</title>
    <style>
        body{
            color: #444;
            font-family: 'Arial';
            background:linear-gradient(rgba(255,255,255,.85), rgba(255,255,255,.85)), url('/images/logo.png');
            background-size: 400px;
            background-repeat: no-repeat;
            background-position: center;
        }
        body .top *{
            line-height:5px;
        }
        table{
            margin-bottom:10px;
        }
        small {
            display: block;
            font-size: .7em;
            line-height: 1.2em;
        }
        table * {
            vertical-align: top;
        }
        strong {
            font-size: 14px;
            text-decoration-style: wavy;
            text-transform: uppercase;
        }
        .footer {
            border-top: 1px solid #f1f1f1;
            padding-top: 10px;
            position: fixed;
            width:100%;
            bottom: 0px;
            left: 50%;
            transform: translateX(-50%);
        }
        .title{
            font-size: 20px;
            border: 2px solid;
            padding: 10px 20px;
            width: 300px;
            margin: 15px auto;
        }
    </style>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
</head>
<body>
<div style="width:100%">
    <table width="100%">
        <tr>
            <td width="150">
                <img src="{{ asset('images/logo.png') }}" alt="LOGO" width="90px">
            </td>
            <td>
                <h3 style="margin:0">Ivoire Dépannage Express</h3>
                <p style="margin:0 0 10px"><small>Pour tous vos travaux de dépannage de véhicules, d'engins de remorquage de véhicules accidentés, en stationnement irrégulier ou panne sur la voie publique</small></p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="color:#888;text-align:center"><h1 class="title">FACTURE PROFORMA</h1></td>
        </tr>
    </table>

        <table class="table table-bordered">
            <tr>
                <th>N°Facture:</th>
                <th>Doit:</th>
                <th>Contact:</th>
                <th>CNI</th>
                <th>Date & Heure</th>
                <th>Entrée</th>
                <th>Lieu</th>
                <th>Sortie</th>
                <th>Dépanneuse</th>
                <th>Marques</th>
                <th>Immatriculations</th>
                <th>Motif</th>
                <th>Dépôt</th>
                <th>Cat. Véh</th>
                <th>Type tarif</th>
                <th>Nb jours pén.</th>
                <th>Tarif pén.</th>
                <th>Total</th>
                <th>Reduction</th>
                <th>Tot. HT</th>
            </tr>
            @foreach($repairs as $repair)
                <tr>
                    <td>{!! $repair->reference !!}</td>
                    <td>{!! $repair->client->fullname !!}</td>
                    <td>{!! $repair->client->phone1 !!}</td>
                    <td># {!! $repair->client->cni !!}</td>
                    <td>{{ gmdate('d/m/Y H:i') }}</td>
                    <td><strong>{!! gmdate('d/m/Y', strtotime($repair->date_getting)) !!}</strong> à <strong>{!! $repair->hour_getting !!}</strong></td>
                    <td>{!! $repair->place_getting !!}</td>
                    <td>{!! ($repair->date_release)?gmdate('d/m/Y', strtotime($repair->date_release)):"..." !!}</td>
                    <td><strong>{!! $repair->wrecker->code !!}</strong></td>
                    <td><strong>{!! $repair->car_brand !!}</strong></td>
                    <td><strong>{!! $repair->car_imm !!}</strong></td>
                    <td><strong>{!! $repair->reasons !!}</strong></td>
                    <td><strong>{!! $repair->park !!}</strong></td>
                    <td><strong>{!! $repair->vehiclecategory->code !!}</strong></td>
                    <td>{!! $repair->typepricing() !!}</td>
                    <td><strong>{!! ($repair->numberDays()>3)?$repair->numberDays()-3: 0;  !!}</strong></td>
                    <td><strong style="line-height: 1.5em;">{!! number_format($repair->penalite(),0,'','.') !!} FCFA @if($repair->perKg()) /KG @endif</strong></td>
                    <td>{!! number_format($repair->sumDays()+$repair->tva(),0,'','.') !!} FCFA</td>
                    <td><strong>{!! number_format($repair->reduction) !!} FCFA</strong></td>
                    <td><h3>{!! number_format($repair->sumDays()+$repair->tva() - $repair->reduction,0,'','.') !!} FCFA</h3></td>
                    <td></td>
                </tr>
            @endforeach
        </table>
        <table>
            <tr>
                <td><h3>TOTAL</h3></td>
                <td>{!! number_format($tot,0,'','.') !!} FCFA</td>
            </tr>
        </table>
    <table width="100%">
        <body>
        <tr>
            <td width="60%">
                <strong>Signature du client</strong>
                <div style="display:block; width:300px; height:100px; border:1px solid #f1f1f1;"></div>
            </td>
            <td>
                <strong>Nom du facturier</strong>
                <p></p>
            </td>
        </tr>
        </body>
    </table>
</div>
<div class="footer" style = "color:#888;font-size:13px;font-family: ArialMT !important; text-align:center">
    <div>21 BP 5214 ABIDJAN 21 RCCM N°:CI-ABJ-2016-B-983 - SARL au Capital de 500.000 CFA</div>
    <div>CC N°:1601904H Régime Réel Simplifié d'Imposition - Coris Bank: 02347324101 03</div>
    <div>Tél: 23 46 55 71. Cel: 02 54 42 00 / 87 59 14 53 / 02 54 44 42 - Email: ivoiredepannage@gmail.com</div>
    <br>
</div>
<script rel="text/javascript">
    window.print();
    setTimeout(function () { window.close(); }, 1000);
</script>
</body>
</html>
