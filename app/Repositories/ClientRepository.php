<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\Repair;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientRepository
{
    public $rules = [
        'fullname' => 'required|min:3',
        'phone1' => 'required|min:8'
    ];

    public $updatingRules = [
        'id' => 'required|exists:clients,id',
        'fullname' => 'required|min:3',
        'phone1' => 'required'
    ];
    public $updatingRulesMessages = [
        'id.required' => 'Identifiant obligatoire.',
        'id.exists' => 'Nous n\'avons pas retrouvé cet identifiant.',
        'fullname.required' => 'Le nom est obligatoire.',
        'fullname.min' => 'Le nom doit contenir au moins 3 lettres.',
        'phone1.required' => 'Le numéro de téléphone est obligatoire.'
    ];

    public $destroyingRules = [
        'id_client' => 'required|exists:clients,id'
    ];

    public $destroyingRulesMessages = [
        'id_client.required' => 'Nous avons besoin d\'un identifiant',
        'id_client.exists' => 'L\'identifiant inconnu.'
    ];

    public $message_success = 'Client enregistré avec succès';
    public $update_success = 'Client modifié avec succès';
    public $destroy_success = 'Client supprimé avec succès';
    public $destroy_failed = 'Les informations du client n\'ont pas pu être supprimées';
    public $message_fail = 'Echec de l\'enregistrement du client';
    public $update_failed = 'Echec de la modification des informations du client.';

    public $class_fail = 'alert alert-danger';
    public $class_success = 'alert alert-success';

    public function all() {
        return Client::orderBy('created_at', 'desc')->get();
    }

    public function create(Request $request) {
        $client = Client::create(
            [
                'fullname' => $request->get('fullname'),
                'num_license' => $request->get('num_license'),
                'passport' => $request->get('passport'),
                'cni' => $request->get('cni'),
                'phone1' => $request->get('phone1'),
                'phone2' => $request->get('phone2')
            ]
        );

        return $client;
    }

    public function update(Request $request) {
        $client = Client::find($request->get('id'));
        $client->fullname = $request->get('fullname');
        $client->passport = $request->get('passport');
        $client->cni = $request->get('cni');
        $client->num_license = $request->get('num_license');
        $client->phone1 = $request->get('phone1');
        $client->phone2 = $request->get('phone2');
        return $client->save();
    }

    public function destroy(Request $request) {

        $client = Client::find($request->get('id_client'));

        return $client->delete();
    }

    public function newClients() {
        return Client::whereDate('created_at', Carbon::today()->toDateString())->get();
    }
}
