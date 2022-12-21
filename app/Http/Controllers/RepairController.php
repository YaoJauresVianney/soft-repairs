<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Peopletype;
use App\Models\Vehiclecategory;
use App\Models\Wrecker;
use App\Models\Criteria;
use App\Models\Repair;
use App\Models\Transaction;
use App\Repositories\RepairRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepairController extends Controller
{
    private $repairRepo;
    public function __construct(RepairRepository $repairRepo) {
        $this->repairRepo = $repairRepo;
    }
    private function generateReference(int $length) {
        $characters = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function index() {
        $repairs = $this->repairRepo->inParc();
        //dd($repairs);
        return view('repairs.index', compact('repairs'));
    }

    public function create() {
        $reference = 'REF-' . $this->generateReference(12);
        $categories = Vehiclecategory::all();
        $wreckers = Wrecker::orderBy('code')->get();
        $peopleTypes = Peopletype::all();
        $clients = Client::all();
        $criterias = Criteria::all();
        return view('repairs.create', compact('reference', 'categories', 'wreckers', 'peopleTypes', 'clients', 'criterias'));
    }

    private function diffDate($start, $end) {
        $d1 = new \DateTime($end);
        $d2 = new \DateTime($start);
        $interval = $d1->diff($d2);
        $days = $interval->format('%a');
        return $days;
    }


    public function showing(Request $request) {
        $contents = $request;
        dd($contents);
        return view('repairs.show', compact('contents'));
    }

    public function store(Request $request) {
        // dd(Client::all()->last()->id);
        $clientId = null;
        // Repair
        $this->validate($request, [
            'reference' => ['required'],
            'date_getting' => 'required',
            'hour_getting' => ['required'],
            'place_getting' => ['required'],
            'car_brand' => ['required'],
            'vehiclecategory_id' => ['required', 'exists:vehiclecategories,id'],
            'car_imm' => ['required'],
            'wrecker_id' => ['required', 'exists:wreckers,id'],
            'peopletype_id' => ['required', 'exists:peopletypes,id'],
            'reasons' => ['required'],
            'park' => ['required'],
        ]);

        // Client
        if($request->client_id == null) {
            //Add client
            $this->validate($request, [
                'fullname' => ['required'],
                'phone1' => ['required']
            ]);

            $client = Client::create([
                'fullname' => $request->fullname,
                'cni' => $request->cni,
                'num_license' => $request->num_license,
                'passport' => $request->passport,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
            ]);

            $clientId = Client::all()->last()->id;
        } else {
            $clientId = $request->client_id;
        }
        $days = $this->diffDate($request->date_getting, gmdate('Y-m-d'));

        //dd($days, $stt);
        $repair = Repair::create([
            'reference' => $request->reference,
            'date_getting' => $request->date_getting,
            'hour_getting' => $request->hour_getting,
            'place_getting' => $request->place_getting,
            'car_brand' => $request->car_brand,
            'vehiclecategory_id' => $request->vehiclecategory_id,
            'car_imm' => $request->car_imm,
            'wrecker_id' => $request->wrecker_id,
            'peopletype_id' => $request->peopletype_id,
            'reasons' => $request->reasons,
            'client_id' => $clientId,
            'luggage' => $request->luggage,
            'car_license' => $request->car_license,
            'car_keys' => $request->car_keys,
            'kg' => $request->kg,
            'exchanger' => $request->exchanger,
            'counter' => $request->counter,
            'kms' => $request->kms,
            'extension' => $request->extension,
            'charge' => $request->charge,
            'pc' => $request->pc,
            'scope' => $request->scope,
            'tvs_place' => $request->tvs_place,
            'others' => $request->others,
            'archived' => $days >= 180 ? 1 : 0,
            'park' => $request->park,
        ]);
        //dd($repair);
        if($repair) {
            return redirect()->route('repairs.index')->with([
                'message' => 'Dépannage enregistré avec succès.',
                'class' => 'alert alert-success'
            ]);
        }
        return redirect()->back()->with([
            'message' => 'Echec de l\'enregistrement.',
            'class' => 'alert alert-danger'
        ]);
    }

    public function edit(int $id) {
        $repair = Repair::find($id);
        $categories = Vehiclecategory::all();
        $wreckers = Wrecker::orderBy('code')->get();
        $peopleTypes = Peopletype::all();
        $clients = Client::all();
        $criterias = Criteria::all();

        return view('repairs.edit', compact('repair', 'categories', 'wreckers', 'peopleTypes', 'clients', 'criterias'));
    }

    public function showProforma(int $id) {
        $repair = Repair::find($id);

        return view('repairs.invoice', compact('repair'));
    }

    public function showReceipt(int $id) {
        $repair = Repair::find($id);
        return view('repairs.receipt', compact('repair'));
    }

    public function payment(int $id) {
        $repair = Repair::find($id);

        return view('repairs.payment', compact('repair'));
    }

    public function update(Request $request) {
        //dd($request);
        $clientId = $request->client_id;
        // Repair
        $this->validate($request, [
            'id' => ['required', 'exists:repairs,id'],
            'date_getting' => 'required',
            'hour_getting' => ['required'],
            'place_getting' => ['required'],
            'car_brand' => ['required'],
            'vehiclecategory_id' => ['required', 'exists:vehiclecategories,id'],
            'car_imm' => ['required'],
            'wrecker_id' => ['required', 'exists:wreckers,id'],
            'peopletype_id' => ['required', 'exists:peopletypes,id'],
            'reasons' => ['required'],
            'park' => ['required']
        ]);

        // Client
        if($request->new == "on") {
            // Create a new client
            $this->validate($request, [
                'fullname' => ['required'],
                'phone1' => ['required'],
            ]);

            $client = Client::create([
                'fullname' => $request->fullname,
                'cni' => $request->cni,
                'num_license' => $request->num_license,
                'passport' => $request->passport,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
            ]);
            $clientId = Client::all()->last()->id;
        }

        $days = $this->diffDate($request->date_getting, gmdate('Y-m-d'));
        // Modify the repair
            $repair = Repair::find($request->id);
            $repair->date_getting = $request->date_getting;
            $repair->hour_getting = $request->hour_getting;
            $repair->place_getting = $request->place_getting;
            $repair->car_brand = $request->car_brand;
            $repair->vehiclecategory_id = $request->vehiclecategory_id;
            $repair->car_imm = $request->car_imm;
            $repair->wrecker_id = $request->wrecker_id;
            $repair->peopletype_id = $request->peopletype_id;
            $repair->reasons = $request->reasons;
            $repair->client_id = $clientId;
            $repair->luggage = $request->luggage;
            $repair->car_license = $request->car_license;
            $repair->car_keys = $request->car_keys;
            $repair->kg = $request->kg;
            $repair->exchanger = $request->exchanger;
            $repair->counter = $request->counter;
            $repair->kms = $request->kms;
            $repair->extension = $request->extension;
            $repair->charge = $request->charge;
            $repair->pc = $request->pc;
            $repair->scope = $request->scope;
            $repair->tvs_place = $request->tvs_place;
            $repair->others = $request->others;
            $repair->archived = $days >= 180 ? 1 : 0;
            $repair->park = $request->park;
            $repair->reduction = $request->reduction;
            $update = $repair->save();

            if($update) {
                return redirect()->route('repairs.index')->with([
                    'message' => 'Modification effectuée.',
                    'class' => 'alert alert-success'
                ]);
            }
            return redirect()->back()->with([
                'message' => 'Echec de la modification. Vérifiez la cohérence de vos enregistrements.',
                'class' => 'alert alert-danger'
            ]);
    }

    public function closed() {
        /*
        $repairs = Repair::where('state', 'closed')
            ->orderBy('updated_at', 'desc')
            ->get();
*/
        $repairs = $this->repairRepo->release();
        return view('repairs.closed', compact('repairs'));
    }

    public function invoiceOrReceipt(int $id, $kind) {
        $repair = Repair::find($id);
        if($kind == 'invoice') {
            return view('repairs.invoice', compact('repair'));
        } else {
            return view('repairs.receipt', compact('repair'));
        }
    }

    public function destroy(Request $request) {
        $this->validate($request, [
            'id' => ['required', 'exists:repairs,id'],
        ]);

        $repair = Repair::find($request->id);
        $repair->deleted_at = Carbon::now();
        $repair->save();

        return redirect()->back();
    }


    private function releaseTheCar(Repair $repair) {
        $repair->state = 'closed';
        $repair->archived = 1;
        $repair->date_release = Carbon::now();
        $paying = $repair->save();
        if($paying) {
            return true;
        }
        return false;
    }

    public function pay(Request $request) {
        $this->validate($request, [
            'way_of' => 'required',
            'amount' => 'required',
            'repair_id' => ['required', 'exists:repairs,id']
        ]);
        $repair = Repair::find($request->repair_id);
        // Saving
        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'num_transaction' => $request->num_transaction,
            'type' => 'income',
            'amount' => $request->amount,
            'way_of' => $request->way_of,
            'repair_id' => $request->repair_id,
            'desc' => "Règlement de la facture N°$repair->reference d'un montant de " . number_format($request->amount, 0, ' ', '.') . "FCFA"
        ]);
        if($transaction) {
            $r = $this->releaseTheCar($repair);
            if($r) {
                return redirect()->route('repairs.closed')->with([
                    'class' => 'alert alert-success',
                    'message' => "$repair->reference a été réglée avec succès"
                ]);
            }
            return redirect()->route('repairs.closed')->with([
                'class' => 'alert alert-danger',
                'message' => "le règlement $repair->reference"
            ]);
        }

    }

    public function sixMonths() {
        $repairs = $this->repairRepo->sixMonths();
        return view('repairs.old', compact('repairs'));
    }


}
