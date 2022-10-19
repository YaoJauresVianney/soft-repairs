<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    private $userRepo;
    public function __construct(UserRepository $userRepo) {
        $this->userRepo = $userRepo;
    }
    public function index() {
        if(Auth::user()->role == 'gerant') {
            $users = $this->userRepo->all();
            return view('users.index', compact('users'));
        } else {
            return redirect()->back()->with([
                'message' => "Accès Interdit",
                'class' => 'alert alert-warning'
            ]);
        }
    }

    public function create() {
        return view('users.create');
    }

    public function edit(int $id) {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function store(Request $request) {
        $this->validate($request, $this->userRepo->rules['store']);
        $store = $this->userRepo->create($request);

        if($store) {
            return redirect()->route('users.index')->with([
                'message' => 'Ajout réussie',
                'class' => 'alert alert-success'
            ]);
        }
        return redirect()->route('users.index')->with([
            'message' => 'Echec de l\'ajout',
            'class' => 'alert alert-danger'
        ]);
    }

    public function update(Request $request) {
        $this->validate($request, $this->userRepo->rules['update']);
        $update = $this->userRepo->update($request);

        if($update) {
            return redirect()->route('users.index')->with([
                'message' => 'Modification réussie',
                'class' => 'alert alert-success'
            ]);
        }
        return redirect()->route('users.index')->with([
            'message' => 'Echec de la modification',
            'class' => 'alert alert-danger'
        ]);
    }

    public function destroy(Request $request) {
        $this->validate($request, $this->userRepo->rules['destroy']);

        $destroy = $this->userRepo->destroy($request);
        if($destroy) {
            return redirect()->route('users.index')->with([
                'message' => 'Suppression réussie',
                'class' => 'alert alert-success'
            ]);
        }
        return redirect()->route('users.index')->with([
            'message' => 'Echec de la Suppression',
            'class' => 'alert alert-danger'
        ]);
    }
}
