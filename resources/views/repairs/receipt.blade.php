<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reçu de paiement - Facture {{ $repair->reference }}</title>
  <style>
    body{
      color: #444;
      font-family: 'Arial','ArialMT';
      background-size: 100% !important;
      font-size:1.2rem;
      background-repeat: no-repeat !important;
      background-position: center 200px !important;
      border: 2px solid #ddd;
      padding: 30px 10px;
      margin: 100px -10px 0px;
      /*transform: translateY(-50%);*/
    }
    small {
      display: block;
      font-size: .7em;
      line-height: 1.2em;
    }
    .title{
      font-size: 16px;
      border: 1px solid;
      padding: 10px 20px;
      width: 300px;
      color:#444 !important;
      margin: 15px auto;
    }
    table * {
      vertical-align: top;
    }
    table tr td{
      padding: 10px 0px;
    }
    .footer {
        /* border-top: 1px solid #f1f1f1 */;
       /* padding-top: 10px;*/
        /* position: fixed; */
        width:100%;
        bottom: 0px;
        /* left: 50%;
        transform: translateX(-50%); */
    }
  </style>
</head>
<body style="background:linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url({!! asset('img/logo.png') !!});">
  <div>
    <table>
      <tr>
        <td width="150">
          <img src="{{ asset('img/logo.png') }}" alt="LOGO" width="120px">
        </td>
        <td>
          <h3 style="margin:0">Ivoire Dépannage Express</h3>
          <p style="margin:0 0 10px"><small>Pour tous vos travaux de dépannage de véhicules, d'engins de remorquage de véhicules accidentés, en stationnement irrégulier ou panne sur la voie publique</small></p>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="color:#44b932;text-align:center"><h1 class="title">RECU DE PROFORMA</h1></td>
      </tr>
    </table>
    <table width="100%">
      <tr>
        <td width="20%" colspan="2">Reçu de: <strong>{{ $repair->client->fullname }}</strong></td>
      </tr>
      <tr>
        <td width="20%" colspan="2">Motif de l'enlèvement: <strong>{{ $repair->reasons }}</strong></td>
      </tr>
      <tr>
        <td width="20%" colspan="2">Lieu de l'enlèvement: <strong>{{ $repair->place_getting }}<br></strong></td>
      </tr>
      <tr>
        <td colspan="2">La somme hors taxe de : <strong>{!! number_format($repair->sumDays()+$repair->tva() - $repair->reduction,0,'','.') !!} FCFA</strong></td>
      </tr>
      <tr>
        <td width="20%" colspan="2">Marque du véhicule : <strong>{{ $repair->car_brand }}<br></strong></td>
      </tr>
      <tr>
        <td width="20%" colspan="2">Immatriculation du véhicule : <strong>{{ $repair->car_imm }}<br></strong></td>
      </tr>
      <tr>
        <td width="20%" colspan="2">Date d'entrée du véhicule : <strong>{{ date('d-m-Y',strtotime($repair->date_getting)) }} à {{ $repair->hour_getting }} <br></strong></td>
      </tr>
      <tr>
        <td width="20%" colspan="2">Catégorie du véhicule : <strong>{{ $repair->vehiclecategory->type }}<br></strong></td>
      </tr>
      <tr>
            <td><strong>NB: Pour la facture, vous devez venir avec la TVA c'est-à-dire 18% de la somme hors taxe, en plus du timbre.</strong></td>
        </tr>
      <tr>
        <td colspan="2">Pour : <strong>{!! 'Règlement de la facture N°'.$repair->reference !!}</strong></td>
      </tr>
      <tr>
        <td>
          <strong>Signature</strong>
          <div style="width:300px; height:150px; border:1px solid #555;"></div>
        </td>
        <td style="padding-left:20px">Fait à Abidjan, le <strong>{{ gmdate('d/m/Y', strtotime($repair->date_release)) }}</strong></td>
      </tr>
    </table>
  </div>
  <div class="footer" style = "color:#888;font-size:12px;font-family:font-family: Arial,ArialMT !important; text-align:center">
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
