<?php

namespace App\Repositories;

use App\Models\Peopletype;
use App\Models\Pricepenality;
use App\Models\Transaction;
use App\Models\Vehiclecategory;
use Illuminate\Http\Request;

class PricePenalityRepository
{
    public $rules =  [
        'vehiclecategory_id' => 'required|exists:vehiclecategories,id',
        'peopletype_id' => 'required|exists:peopletypes,id',
        'penality_per_day' => 'required|numeric',
    ];

    public $updatingRules = [
        'id' => 'required|exists:pricepenalyties,id',
        'vehiclecategory_id' => 'required|exists:vehiclecategories,id',
        'peopletype_id' => 'required|exists:peopletypes,id',
        'penality_per_day' => 'required|numeric'
    ];

    public $destroyingRules = [
        'id' => 'required|exists:pricepenalyties,id'
    ];

    public function all() {
        return Pricepenality::all();
    }

    public function create(Request $request) {
        $code = "";
        $vehicleCat = Vehiclecategory::find($request->vehiclecategory_id);
        $peopletype = Peopletype::find($request->peopletype_id);
        $code = $vehicleCat->code . '-' . $peopletype->code . '-' . Transaction::generateRandString(5);

        return Pricepenality::create(
            [
                'vehiclecategory_id' => $request->vehiclecategory_id,
                'peopletype_id' => $request->peopletype_id,
                'code' => $code,
                'penality_per_day' => $request->penality_per_day
            ]
        );
    }

    public function update(Request $request) {
        $pricepenality = Pricepenality::find($request->id);
        $pricepenality->vehiclecategory_id = $request->vehiclecategory_id;
        $pricepenality->peopletype_id = $request->peopletype_id;
        $pricepenality->code = $pricepenality->vehiclecategory->code . '-' . $pricepenality->peopletype->label . '-' . Transaction::generateRandString(5);
        $pricepenality->penality_per_day = $request->penality_per_day;
        return $pricepenality->save();
    }
}
