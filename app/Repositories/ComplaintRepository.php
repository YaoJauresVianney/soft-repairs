<?php

namespace App\Repositories;

use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ComplaintRepository
{

    public $rules = [
        'store' => [
            'client_id' => 'required|exists:clients,id',
            'brand' => 'required',
            'car_imm' => 'required',
            'date_getting' => 'required',
            'place_getting' => 'required',
            'reasons' => 'required',
            'goals' => 'required'
        ],
        'update' =>[
            'id' => 'required|exists:complaints,id',
            'client_id' => 'required|exists:clients,id',
            'brand' => 'required',
            'car_imm' => 'required',
            'date_getting' => 'required',
            'place_getting' => 'required',
            'reasons' => 'required',
            'goals' => 'required'
        ],
        'destroy' =>[
            'id' => 'required|exists:complaints,id',
        ]
    ];

    public function create(Request $request) {
        return Complaint::create([
            'client_id' => $request->client_id,
            'vehicle_rights' => $request->vehicle_rights,
            'brand' => $request->brand,
            'car_imm' => $request->car_imm,
            'date_getting' => $request->date_getting,
            'place_getting' => $request->place_getting,
            'reasons' => $request->reasons,
            'goals' => $request->goals,
            'user_id' => Auth::user()->id,
            'state' => $request->state == 'on' ? true : false
        ]);
    }

    public function update(Request $request) {
        $complaint = $this->findComplaint($request->id);
        $complaint->client_id = $request->client_id;
        $complaint->brand = $request->brand;
        $complaint->car_imm = $request->car_imm;
        $complaint->date_getting = $request->date_getting;
        $complaint->place_getting = $request->place_getting;
        $complaint->reasons = $request->reasons;
        $complaint->goals = $request->goals;
        $complaint->vehicle_rights = $request->vehicle_rights;
        return $complaint->save();
    }

    public function destroy(Request $request) {
        $complaint = $this->findComplaint($request->id);
        return $complaint->delete();
    }

    private function findComplaint(int $id) {
        return Complaint::find($id);
    }
}
