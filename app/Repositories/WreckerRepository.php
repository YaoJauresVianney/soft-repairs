<?php

namespace App\Repositories;

use App\Models\Wrecker;
use Illuminate\Http\Request;

class WreckerRepository
{
    public $class_success = 'alert alert-success';
    public $class_fail = 'alert alert-danger';
    public $store_success = "Dépanneuse enregistrée avec succès.";
    public $store_failed = "Echec de l'enregistrement de la dépanneuse.";
    public $update_success = "Dépanneuse mise à jour.";
    public $update_failed = "Echec de la mise à jour de la dépanneuse.";
    public $destroy_success = "Dépanneuse supprimée.";
    public $destroy_failed = "La dépanneuse n'a pas pu être supprimée. Vérifiez la cohérence de vos informations.";

    public $rules = [
        'code' => 'required',
        'car_imm' => 'required',
        'label' => 'required',
    ];

    public $updateRules = [
        'id' => 'required|exists:wreckers,id',
        'code' => 'required',
        'car_imm' => 'required',
        'label' => 'required',
        ''
    ];

    public $destroyingRules = [
        'id' => 'required|exists:wreckers,id'
    ];

    public function all() {
        return Wrecker::orderBy('created_at', 'desc')->get();
    }

    public function create(Request $request) {
        $wrecker = Wrecker::create([
            'code' => $request->code,
            'car_imm' => $request->car_imm,
            'label' => $request->label,
            'is_enabled' => $request->is_enabled == 'on' ? 1 : 0
        ]);
        return $wrecker;
    }

    public function update(Request $request) {
        //dd($request);
        $wrecker = Wrecker::find($request->id);
        $wrecker->code = $request->code;
        $wrecker->car_imm = $request->car_imm;
        $wrecker->label = $request->label;
        $wrecker->is_enabled = $request->is_enabled == 'on' ? 1 : 0;
        $wrecker->gray_card = $request->gray_card == 'on' ? 1 : 0;
        $wrecker->technical_visit = $request->technical_visit;
        $wrecker->parking_card = $request->parking_card;
        $wrecker->transport_card = $request->transport_card;
        $wrecker->tax = $request->tax;
        $wrecker->insurance = $request->insurance;
        return $wrecker->save();
    }

    public function destroy(Request $request) {
        $wrecker = Wrecker::find($request->id);
        return $wrecker->delete();
    }
}
