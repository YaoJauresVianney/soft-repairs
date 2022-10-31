<?php

namespace App\Repositories;

use App\Models\Pricegetting;
use Illuminate\Http\Request;

class PricegettingRepository
{
    public $rules = [
        'vehiclecategory_id' => 'required|exists:vehiclecategories,id',
        'peopletype_id' => 'required|exists:peopletypes,id',
        'price_day' => 'required',
        'price_night' => 'required'
    ];

    public $updatingRules = [
        'id' => 'required|exists:pricegettings,id',
        'vehiclecategory_id' => 'required|exists:vehiclecategories,id',
        'peopletype_id' => 'required|exists:peopletypes,id',
        'price_day' => 'required',
        'price_night' => 'required'
    ];

    public $destroyingRules = [
        'id' => 'required|exists:pricegettings,id'
    ];

    public function all() {
        return Pricegetting::with('peopletype', 'vehiclecategory')
            ->orderBy('created_at', 'desc')->get();
    }

    public function create(Request $request) {
        return Pricegetting::create([
            'vehiclecategory_id' => $request->vehiclecategory_id,
            'peopletype_id' => $request->peopletype_id,
            'code' => rand(1000000, 1000000000000000000),
            'price_day' => $request->price_day,
            'price_night' => $request->price_night
        ]);
    }

    public function update(Request $request) {
        $pricegetting = Pricegetting::find($request->id);

        $pricegetting->vehiclecategory_id = $request->vehiclecategory_id;
        $pricegetting->peopletype_id = $request->peopletype_id;
        $pricegetting->price_day = $request->price_day;
        $pricegetting->price_night = $request->price_night;
        return $pricegetting->save();
    }

    public function destroy(Request $request) {
        $pricegetting = Pricegetting::find($request->id);

        return $pricegetting->delete();
    }
}
