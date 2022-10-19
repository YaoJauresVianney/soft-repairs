<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Repositories\CriteriaRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Flash;

class CriteriaController extends Controller
{
    private $criteriaRepo;
    public function __construct(CriteriaRepository $criteriaRepo){
        $this->criteriaRepo = $criteriaRepo;
    }

    public function index() {
        $criterias = $this->criteriaRepo->all();
        return view('criterias.index', compact('criterias'));
    }

    public function create() {
        return view('criterias.create');
    }

    public function store(Request $request) {
        $this->validate($request, $this->criteriaRepo->rules);
        $response = $this->criteriaRepo->create($request);
        if($response) {
            return redirect()->route('criterias.index')->with($this->criteriaRepo->params_success);
        }
        return redirect()->back()->with($this->criteriaRepo->params_fail);
    }

    public function edit(int $id) {
        $criteria = Criteria::find($id);
        return view('criterias.edit', compact('criteria'));
    }

    public function update(Request $request) {
        $this->validate($request, $this->criteriaRepo->updatingRules);
        $response = $this->criteriaRepo->update($request);
        if($response) {
            return redirect()->route('criterias.index')->with([
                'message' => "Modification réussie",
                'class' => "alert alert-success"
            ]);
        }
        return redirect()->back()->with([
            'message' => "Echec de la modification",
            'class' => "alert alert-danger"
        ]);
    }

    public function destroy(Request $request) {
        $this->validate($request, $this->criteriaRepo->destroyingRules);
        $response = $this->criteriaRepo->destroy($request);
        if($response) {
            return redirect()->route('criterias.index')->with([
                'message' => "Suppression réussie",
                'class' => "alert alert-success"
            ]);
        }
        return redirect()->back()->with([
            'message' => "Echec de la suppression",
            'class' => "alert alert-danger"
        ]);
    }
}
