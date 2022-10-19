<?php

namespace App\Repositories;

use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaRepository
{
    public $params_success = [
        'message' => "Le critère a été enregistré avec succès.",
        'class' => "alert alert-success"
    ];
    public $params_fail = [
        'message' => "L'enregistrement a échoué veuillez vérifier la cohérence de vos informations.",
        'class' => "alert alert-danger"
    ];
    public $rules = [
        'code' => 'required|min:3',
        'label' => 'required',
    ];
    public $updatingRules = [
        'id' => 'required|exists:criterias,id',
        'code' => 'required',
        'label' => 'required'
    ];
    public $destroyingRules = [
        'id' => 'required|exists:criterias,id'
    ];
    public function all() {
        return Criteria::orderBy('created_at', 'desc')->get();
    }
    public function create(Request $request) {
        return Criteria::create(
            [
                'code' => $request->code,
                'label' => $request->label,
                'is_enabled' => $request->is_enabled == 'on' ? 1 : 0,
            ]
        );
    }

    public function update(Request $request) {
        $criteria = Criteria::find($request->id);
        $criteria->code = $request->code;
        $criteria->label = $request->label;
        $criteria->is_enabled = $request->is_enabled == 'on' ? 1 : 0;
        return $criteria->save();
    }

    public function destroy(Request $request) {
        $criteria = Criteria::find($request->id);
        return $criteria->delete();
    }
}
