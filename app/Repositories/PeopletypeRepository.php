<?php

namespace App\Repositories;

use App\Models\Peopletype;
use Illuminate\Http\Request;

class PeopletypeRepository
{
    public $rules = [
        'code' => 'required',
        'label' => 'required'
    ];

    public $updatingRules = [
            'id' => 'required|exists:peopletypes,id',
            'code' => 'required',
            'label' => 'required',
        ];

    public $destroyingRules = [
        'id' => 'required|exists:peopletypes,id'
    ];

    public function all() {
        return Peopletype::all();
    }

    public function create(Request $request) {
        return Peopletype::create([
            'code' => $request->code,
            'label' => $request->label,
            'is_enabled' => $request->is_enabled == 'on' ? 1 : 0
        ]);
    }

    public function update(Request $request) {
        $peopletype = Peopletype::find($request->id);
        $peopletype->code = $request->code;
        $peopletype->label = $request->label;
        $peopletype->is_enabled = $request->is_enabled == 'on' ? 1 : 0;
        return $peopletype->save();
    }

    public function destroy(Request $request) {
        $peopletype = Peopletype::find($request->id);
        return $peopletype->delete();
    }
}
