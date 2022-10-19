<?php

namespace App\Http\Controllers;

use App\Models\Peopletype;
use App\Models\Pricepenality;
use App\Models\Transaction;
use App\Models\Vehiclecategory;
use App\Repositories\PricePenalityRepository;
use Illuminate\Http\Request;

class PricePenalityController extends Controller
{
    private $pricepenalityRepo;
    public function __construct(PricePenalityRepository $pricepenalityRepo) {
        $this->pricepenalityRepo = $pricepenalityRepo;
    }
    public function index() {
        $pricepenalities = $this->pricepenalityRepo->all();
        return view('pricepenalities.index', compact('pricepenalities'));
    }

    public function create() {
        $vehicleCategories = Vehiclecategory::all();
        $peopletypes = Peopletype::all();

        return view('pricepenalities.create', compact('vehicleCategories', 'peopletypes'));
    }

    public function edit(int $id) {
        $pricepenality = Pricepenality::find($id);
        $vehicleCategories = Vehiclecategory::all();
        $peopletypes = Peopletype::all();

        return view('pricepenalities.edit', compact('pricepenality', 'vehicleCategories', 'peopletypes'));

    }

    public function store(Request $request) {
        $this->validate($request, $this->pricepenalityRepo->rules);

        $penality = $this->pricepenalityRepo->create($request);

        if($penality) {
            return redirect()->route('pricepenalities.index')->with([
                'message' => "L'enregistrement a été un succès.",
                'class' => "alert alert-success"
            ]);
        }
        return redirect()->back()->with([
            'message' => "L'enregistrement a échoué.",
            'class' => 'alert alert-danger'
        ]);
    }

    public function update(Request $request) {
        $this->validate($request, $this->pricepenalityRepo->updatingRules);

        $updating = $this->pricepenalityRepo->update($request);

        if($updating) {
            return redirect()->route('pricepenalities.index')->with([
                'message' => "La pénalité a été modifié avec succès.",
                'class' => 'alert alert-success'
            ]);
        }
        return redirect()->back()->with([
            'message' => "Echec de la modification de la pénalité. Vérifiez la cohérence de vos informations.",
            'class' => 'alert alert-danger'
        ]);
    }

    public function destroy(int $id) {
        $pricepenality = Pricepenality::find($id);

        $deleting = $pricepenality->delete();

        if($deleting) {
            return redirect()->route('pricepenalities.index')->with([
                'message' => "La pénalité a été supprimé avec succès.",
                'class' => 'alert alert-success'
            ]);
        }
        return redirect()->back()->with([
            'message' => "Echec de la suppression. Vérifiez la cohérence de vos informations.",
            'class' => 'alert alert-danger'
        ]);
    }
}
