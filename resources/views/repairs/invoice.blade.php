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
  <table width="100%" class="top">
    <tr>
      <td width="60%">
        <p>N°Facture: <strong>{!! $repair->reference !!}</strong></p>
        <p>Doit: <strong>{!! $repair->client->fullname !!}</strong></p>
        <p>Contact: <strong>{!! $repair->client->phone1 !!}</strong></p>
        <p>CNI: <strong># {!! $repair->client->cni !!}</strong></p>
      </td>
      <td>
        <p>Date: <strong>{{ gmdate('d/m/Y') }}</strong></p>
        <p>Heure: <strong>{{ gmdate('H:i:s') }} </strong></p>
      </td>
    </tr>
    <tr>
      <td>
        <p>Date d'entrée: <strong>{!! gmdate('d/m/Y', strtotime($repair->date_getting)) !!}</strong> à <strong>{!! $repair->hour_getting !!}</strong></p>
        <p>Lieux: <strong>{!! $repair->place_getting !!}</strong></p>
        <p>Date de sortie: <strong>{!! ($repair->date_release)?gmdate('d/m/Y', strtotime($repair->date_release)):"......................................" !!}</strong></p>
        <p>Dépanneuse: <strong>{!! $repair->wrecker->code !!}</strong></p>
        <p>Machiniste: ..........................................</p>
        <br>
        <p>Marque du véhicule: <strong>{!! $repair->car_brand !!}</strong></p>
        <p>Immatriculation: <strong>{!! $repair->car_imm !!}</strong></p>
        <p>Nature de l'incident: <strong>{!! $repair->reasons !!}</strong></p>
        <p style="line-height:2em;">Lieu de dépôt du véhicule: <strong  style="line-height: 2em;">YOPOUGON-ANDOKOI</strong> ......................................... ...............................</p>
      </td>
      <td>
        <p>Catégorie du Véhicule: <strong>{!! $repair->vehiclecategory->code !!}</strong></p>
        <p>Type de tarif: <strong>{!! $repair->typepricing() !!}</strong></p>
        <p>Echangeur: <strong>{!! $repair->exchanger !!}</strong></p>
        <p>Décompte: ...............................</p>
        <p>KMS: <strong>{!! $repair->kms !!}</strong></p>
        <p>Extension: <strong>{!! $repair->extension !!}</strong></p>
        <p>Chargement: <strong>{!! $repair->charge !!}</strong></p>
        <p>PC: <strong>{!! $repair->pc !!}</strong></p>
        <p>Portée: <strong>{!! $repair->scope !!}</strong></p>
        <p>TVS/Place: <strong>{!! $repair->tvs_place !!}</strong></p>
        <p>Autres: <strong>{!! $repair->others !!}</strong></p>
      </td>
    </tr>
    <tr>
      <td>
        <p style="line-height:2em;">Observations: .................................................... .............................................................</p>

      </td>
      <td>
        <p>Nombre de jours: <strong>{!! $repair->numberDays() !!}</strong></p>
        <p>Tarif enlèvement: <strong>{!! number_format($repair->tarif(),0,'','.') !!} FCFA @if($repair->perKg()) /KG @endif</strong></p>
        <p  style="line-height:1.5em;">Tarif pénalité par jour:
          <strong style="line-height: 1.5em;">{!! number_format($repair->penalite(),0,'','.') !!} FCFA @if($repair->perKg()) /KG @endif</strong><br>
          <small>(Applicable après trois jours de franchise)</small>
        </p>
        <p>Jours de Pénalité: <strong>{!! ($repair->numberDays()>3)?$repair->numberDays()-3: 0;  !!}</strong></p>
        @if($repair->perKg())
        <p>Total enlèvement: <strong>{!! number_format($repair->tarif()*$repair->kg ,0,'','.')!!} FCFA</strong></p>
        <p>Total des pénalités:
          <strong>{!! number_format(($repair->numberDays()>3)?($repair->numberDays()-3)*$repair->penalite()*$repair->kg: 0,0,'','.'); !!} FCFA</strong></p>
          @endif
        <!-- <p>TVA (18%): <strong>{!! $repair->tva() !!} FCFA</strong></p> -->

          <p>Total : <h3>{!! number_format($repair->sumDays()+$repair->tva(),0,'','.') !!} FCFA</h3></p>
          <p>Réduction : <h3>{!! number_format($repair->reduction) !!} FCFA</h3></p>
        <p>Total HT: <h2>{!! number_format($repair->sumDays()+$repair->tva() - $repair->reduction,0,'','.') !!} FCFA</h2>
          <h3></h3>
        </p>
      </td>
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
  <div class="footer" style = "color:#888;font-size:13px;font-family:font-family: ArialMT !important; text-align:center">
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
