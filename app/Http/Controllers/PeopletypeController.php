<?php

namespace App\Http\Controllers;

use App\Models\Peopletype;
use App\Repositories\PeopletypeRepository;
use Illuminate\Http\Request;

class PeopletypeController extends Controller
{
    private $peopletypeRepo;

    public function __construct(PeopletypeRepository $peopletypeRepo) {
        $this->peopletypeRepo = $peopletypeRepo;
    }
    public function index() {
        $peopletypes = $this->peopletypeRepo->all();
        return view('peopletypes.index', compact('peopletypes'));
    }

    public function create() {
        return view('peopletypes.create');
    }

    public function store(Request $request) {
        $this->validate($request, $this->peopletypeRepo->rules);

        $peopletype = $this->peopletypeRepo->create($request);

        if($peopletype) {
            return redirect()->route('peopletypes.index')->with([
                'msg' => "La catégorie de client $request->code a été ajoutée avec succès.",
                'class' => 'alert alert-success'
            ]);
        }
        return redirect()->back()->with([
            'msg' => "Echec de l'ajout. Vérifiez la cohérence de vos informations.",
            'class' => 'alert alert-danger'
        ]);
    }

    public function edit(int $id) {
        $peopletype = Peopletype::find($id);
        return view('peopletypes.edit', compact('peopletype'));
    }

    public function update(Request $request) {
        $this->validate($request, $this->peopletypeRepo->updatingRules);

        $updated = $this->peopletypeRepo->update($request);

        if($updated) {
            return redirect()->route('peopletypes.index')->with([
                'msg' => "La catégorie de client $request->code a été modifiée avec succès.",
                'class' => 'alert alert-success'
            ]);
        }
        return redirect()->back()->with([
            'msg' => "Echec de la modification. Vérifiez la cohérence de vos informations.",
            'class' => 'alert alert-danger'
        ]);
    }

    public function destroy(Request $request) {
        $this->validate($request, $this->peopletypeRepo->destroyingRules);
        $deleted = $this->peopletypeRepo->destroy($request);

        if($deleted) {
            return redirect()->back()->with([
                'msg' => "La catégorie a été supprimé avec succès.",
                'class' => 'alert alert-success'
            ]);
        }
        return redirect()->back()->with([
            'msg' => "La catégorie n'a pas pu être supprimé. Vérifiez la cohérence de vos informations.",
            'class' => 'alert alert-danger'
        ]);
    }
}
