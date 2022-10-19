<?php

namespace App\Http\Controllers;

use App\Models\Peopletype;
use App\Models\Pricegetting;
use App\Models\Vehiclecategory;
use App\Repositories\PricegettingRepository;
use Illuminate\Http\Request;

class PricegettingController extends Controller
{
    private $pricegettingRepo;

    public function __construct(PricegettingRepository $pricegettingRepo)
    {
        $this->pricegettingRepo = $pricegettingRepo;
    }

    public function index() {
        $pricegettings = $this->pricegettingRepo->all();
        return view('pricegettings.index', compact('pricegettings'));
    }

    public function create() {
        $vehiclecategories = Vehiclecategory::all();
        $peopletypes = Peopletype::all();

        return view('pricegettings.create', compact('vehiclecategories', 'peopletypes'));
    }

    public function store(Request $request) {
        $this->validate($request, $this->pricegettingRepo->rules);

        // Saving
        $pricegetting = $this->pricegettingRepo->create($request);

        if($pricegetting) {
            return redirect()->route('pricegettings.index')->with([
                'msg' => "Le tarif d'enlèvement $pricegetting->id a été enregistré avec succès.",
                'class' => "alert alert-success"
            ]);
        }
        return redirect()->back()->with([
            'msg' => "L'enregistrement a échoué. Vérifiez la cohérence de vos données.",
            'class' => "alert alert-danger"
        ]);
    }

    public function edit(int $id) {
        $pricegetting = Pricegetting::find($id);
        $vehiclecategories = Vehiclecategory::all();
        $peopletypes = Peopletype::all();

        return view('pricegettings.edit', compact('pricegetting', 'vehiclecategories', 'peopletypes'));
    }

    public function update(Request $request) {
        $this->validate($request, $this->pricegettingRepo->updatingRules);

        $updated = $this->pricegettingRepo->update($request);

        if($updated) {
            return redirect()->route('pricegettings.index')->with([
                'msg' => "Le tarif d'enlèvement n°$request->id a été modifié avec succès.",
                'class' => 'alert alert-success'
            ]);
        } else {
            return redirect()->back()->with([
                'msg' => "Le tarif d'enlèvement n°$request->id n'a pas pu être modifié. Veuillez vérifier la cohérence de vos enregistrements.",
                'class' => 'alert alert-danger'
            ]);
        }
    }

    public function destroy(Request $request) {
        $this->validate($request, $this->pricegettingRepo->destroyingRules);

        $deleted = $this->pricegettingRepo->destroy($request);

        if($deleted) {
            return redirect()->route('pricegettings.index')->with([
                'msg' => "Suppression du tarif réussi..",
                'class' => 'alert alert-success'
            ]);
        }
        return redirect()->back()->with([
            'msg' => "Echec de la suppression.",
            'class' => 'alert alert-danger'
        ]);

    }
}
