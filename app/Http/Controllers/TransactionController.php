<?php

namespace App\Http\Controllers;

use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    private $transactionRepo;

    public function __construct(TransactionRepository $transactionRepo) {
        $this->transactionRepo = $transactionRepo;
    }

    public function index(){
        $transactions = $this->transactionRepo->all();
        return view('transactions.index', compact('transactions'));
    }

    public function create() {
        return view('transactions.create');
    }

    public function store(Request $request) {

        $this->validate($request, $this->transactionRepo->rules);

        $transaction = $this->transactionRepo->create($request);

        if($transaction) {
            return redirect()->route('transactions.index')->with(
                [
                    'class' => 'alert alert-success',
                    'msg' => "L'enregistrement de la transaction $transaction->num_transaction a été un succès."
                ]
            );
        }
        return redirect()->route('transactions.index')->with(
            [
                'class' => 'alert alert-danger',
                'msg' => $this->transactionRepo->store_fail
            ]
        );
    }

    public function edit(int $id) {
        $transaction = Transaction::find($id);

        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request) {
        $this->validate($request, $this->transactionRepo->updatingRules);

        $updated = $this->transactionRepo->update($request);

        if($updated) {
            return redirect()->route('transactions.index')->with([
                'msg' => $this->transactionRepo->update_success,
                'class' => 'alert alert-success'
            ]);
        } else {
            return redirect()->back()->with([
                'msg' => $this->transactionRepo->update_fail,
                'class' => 'alert alert-danger'
            ]);
        }
    }

    public function destroy(Request $request) {
        $this->validate($request, $this->transactionRepo->destroyingRules);
        $deleted = $this->transactionRepo->destroy($request);
        if($deleted) {
            return redirect()->route('transactions.index')->with([
                'msg' => $this->transactionRepo->destroy_success,
                'class' => 'alert alert-success'
            ]);
        } else {
            return redirect()->back()->with([
                'msg' => $this->transactionRepo->destroy_fail,
                'class' => 'alert alert-danger'
            ]);
        }
    }
}
