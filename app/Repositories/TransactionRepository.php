<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionRepository
{
    public $rules = [
        'amount' => 'required',
        'way_of' => 'required',
        'type' => 'required'
    ];

    public $updatingRules = [
        'id' => 'required|exists:transactions,id',
        'amount' => 'required',
        'way_of' => 'required',
        'type' => 'required'
    ];
    public $destroyingRules = [
        'id' => 'required|exists:transactions,id',
    ];

    public $destroy_success = "Transaction supprimée avec succès.";
    public $destroy_fail = "Echec de la suppression. Vérifiez la cohérence de vos données.";
    public $store_success = "L'ajout de la transaction a été un succès";
    public $store_fail = "Echec de l'ajout d'une nouvelle transaction";
    public $update_success = "Transaction mise à jour.";
    public $update_fail = "La mise à jour de la transaction a été un echec.";

    public function all() {
        return Transaction::orderBy('created_at', 'desc')->get();
    }

    public function create(Request $request) {
        return Transaction::create([
            'user_id' => Auth::user()->id,
            'type' => $request->type,
            'amount' => $request->amount,
            'way_of' => $request->way_of,
            'desc' => $request->desc,
            'num_transaction' => $request->way_of . '-' . Transaction::generateRandString(16),
            'user_id' => Auth::user()->id
        ]);
    }

    public function update(Request $request) {
        $transaction = Transaction::find($request->id);
        $transaction->user_id = Auth::user()->id;
        $transaction->amount = $request->amount;
        $transaction->way_of = $request->way_of;
        $transaction->type = $request->type;
        $transaction->num_transaction = $request->way_of . '-' . Transaction::generateRandString();
        $transaction->desc = $request->desc;
        return $transaction->save();
    }

    public function destroy(Request $request) {
        $transaction = Transaction::find($request->id);
        return $transaction->delete();
    }

    public function todayIncome() {
        return Transaction::whereDate('created_at', '=', Carbon::today()->toDateString())
            ->where('type', 'income')->sum('amount');
    }
    public function income() {
        return Transaction::where('type', 'income')->sum('amount');
    }
    public function outcome() {
        return Transaction::where('type', 'outcome')->sum('amount');
    }
    public function todayOutcome() {
        return Transaction::whereDate('created_at', '=', Carbon::today()->toDateString())
            ->where('type', 'outcome')->sum('amount');
    }
}
