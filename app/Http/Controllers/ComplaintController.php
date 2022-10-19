<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Complaint;
use App\Repositories\ComplaintRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    private $complaintRepo;
    public function __construct(ComplaintRepository $complaintRepo) {
        $this->complaintRepo = $complaintRepo;
    }
    public function index() {
        $complaints = Complaint::orderBy('created_at', 'desc')->get();
        return view('complaints.index', compact('complaints'));
    }

    public function create() {
        $clients = Client::all();
        return view('complaints.create', compact('clients'));
    }

    public function edit(int $id) {
        $complaint = Complaint::find($id);
        $clients = Client::all();
        return View('complaints.edit', compact('complaint', 'clients'));
    }

    public function store(Request $request) {
        $this->validate($request, $this->complaintRepo->rules['store']);

        $complaint = $this->complaintRepo->create($request);

        if($complaint) {
            return redirect()->route('complaints.index')->with([
                'message' => "Enregistrement réussi.",
                'class' => 'alert alert-success'
            ]);
        }
        return redirect()->back()->with([
            'message' => "Echec de l'enregistrement",
            'class' => 'alert alert-danger'
        ]);
    }

    public function update(Request $request) {
        $this->validate($request, $this->complaintRepo->rules['update']);

        $updating = $this->complaintRepo->update($request);
        if($updating) {
            return redirect()->route('complaints.index')->with([
                'message' => "Modification réussie",
                'class' =>'alert alert-success'
            ]);
        }
        return redirect()->back()->with([
            'message' => "Echec de la modification",
            'class' => 'alert alert-danger'
        ]);
    }

    public function destroy(Request $request) {
        $this->validate($request, $this->complaintRepo->rules['destroy']);
        $delete = $this->complaintRepo->destroy($request);

        if($delete) {
            return redirect()->route('complaints.index')->with([
                'message' => "Suppression réussie",
                'class' =>'alert alert-success'
            ]);
        }
        return redirect()->back()->with([
            'message' => "Echec de la suppression. Veuillez vérifier la cohérence de vos informations.",
            'class' => 'alert alert-danger'
        ]);
    }
}
