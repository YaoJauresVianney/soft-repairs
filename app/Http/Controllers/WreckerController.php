<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wrecker;
use App\Repositories\WreckerRepository;

class WreckerController extends Controller
{
    private $wreckerRepo;

    public function __construct(WreckerRepository $wreckerRepo) {
        $this->wreckerRepo = $wreckerRepo;
    }
    public function index() {
        $wreckers = $this->wreckerRepo->all();
        return view('wreckers.index', compact('wreckers'));
    }

    public function create() {
        return view('wreckers.create');
    }

    public function edit(int $id) {
        $wrecker = Wrecker::find($id);
        return view('wreckers.edit', compact('wrecker'));
    }

    public function store(Request $request) {
        // dd($request);
        $this->validate($request, $this->wreckerRepo->rules);

        $wrecker = $this->wreckerRepo->create($request);
        if($wrecker) {
            return redirect()->route('wreckers.index')->with([
                'msg' => $this->wreckerRepo->store_success,
                'class' => 'alert alert-success'
            ]);
        } else {
            return redirect()->back()->with([
                'msg' => $this->wreckerRepo->store_failed,
                'class' => 'alert alert-danger'
            ]);
        }
    }

    public function update(Request $request) {

        $this->validate($request, $this->wreckerRepo->updateRules);

        $updating = $this->wreckerRepo->update($request);

        if($updating) {
            return redirect()->route('wreckers.index')->with([
                'msg' => $this->wreckerRepo->update_success,
                'class' => 'alert alert-success'
            ]);
        } else {
            return redirect()->back()->with([
                'msg' => "La modification a échouée. Vérifiez la cohérence de vos données.",
                'class' => 'alert alert-danger'
            ]);
        }
    }

    public function destroy(Request $request) {
        $this->validate($request, $this->wreckerRepo->destroyingRules);
        $deleting = $this->wreckerRepo->destroy($request);
        if($deleting) {
            return redirect()->back()->with([
                'msg' => $this->wreckerRepo->destroy_success,
                'class' => $this->wreckerRepo->class_success
            ]);
        }
        return redirect()->back()->with([
            'msg' => $this->wreckerRepo->destroy_failed,
            'class' => $this->wreckerRepo->class_fail,
        ]);
    }

}
