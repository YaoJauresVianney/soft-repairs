<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Repositories\ClientRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $clientRepo;
    public function __construct(ClientRepository $clientRepo) {
        $this->clientRepo = $clientRepo;
    }
    /**public function index() {
        $clients = Client::paginate(10);

        return view('clients.index', compact('clients'));
    }*/

    public function index() {
        $clients = $this->clientRepo->all();

        return view('clients.index', compact('clients'));
    }

    public function create() {
        return view('clients.create');
    }

    public function store(Request $request)  {
        /**
         * Validation
         */
        $this->validate($request, $this->clientRepo->rules);

        /**
         * Saving
         */
        $client = $this->clientRepo->create($request);

        if ($client) {
            return redirect()->route('clients.index')->with([
                'message' => $this->clientRepo->message_success,
                'class' => $this->clientRepo->class_success
            ]);
        }
        return redirect()->back()->with(
            [
                'message' => $this->clientRepo->message_fail,
                'class' => $this->clientRepo->class_fail
            ]
            );
    }

    public function edit(int $id) {
        $client = Client::find($id);

        return view('clients.edit', compact('client'));
    }

    public function update(Request $request) {
        $this->validate($request, $this->clientRepo->updatingRules, $this->clientRepo->updatingRulesMessages);

        $updating = $this->clientRepo->update($request);

        if ($updating) {
            return redirect()->route('clients.index')->with([
                'message' => $this->clientRepo->update_success,
                'class' => $this->clientRepo->class_success
            ]);
        }
        return redirect()->back()->with(
            [
                'message' => $this->clientRepo->update_failed,
                'class' => $this->clientRepo->class_fail
            ]
            );
    }

    public function destroy(Request $request) {

        $this->validate($request, $this->clientRepo->destroyingRules, $this->clientRepo->destroyingRulesMessages);
        $delete = $this->clientRepo->destroy($request);

        if ($delete) {
            return redirect()->route('clients.index')->with([
                'message' => $this->clientRepo->destroy_success,
                'class' => $this->clientRepo->class_success
            ]);
        }
        return redirect()->back()->with(
            [
                'message' => $this->clientRepo->destroy_failed,
                'class' => $this->clientRepo->class_fail
            ]
            );
    }
}
