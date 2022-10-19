<?php

namespace App\Http\Controllers;

use App\Repositories\ClientRepository;
use App\Repositories\RepairRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\WreckerRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $clientRepo;
    private $transactionRepo;
    private $wreckerRepo;
    private $repairRepo;

    public function __construct(
        ClientRepository $clientRepo,
        TransactionRepository $transactionRepo,
        WreckerRepository $wreckerRepo,
        RepairRepository $repairRepo
    )
    {
        $this->transactionRepo = $transactionRepo;
        $this->wreckerRepo = $wreckerRepo;
        $this->clientRepo = $clientRepo;
        $this->repairRepo = $repairRepo;
    }
    public function index() {
        $newClients = count($this->clientRepo->newClients());
        $income = $this->transactionRepo->income();
        $outcome = $this->transactionRepo->outcome();
        $todayIncome = $this->transactionRepo->todayIncome();
        $todayOutcome = $this->transactionRepo->todayOutcome();
        $inParc = count($this->repairRepo->inParc());
        $repairs = count($this->repairRepo->all());
        $release = count($this->repairRepo->release());
        return view('welcome', compact('newClients', 'income', 'outcome', 'todayIncome', 'todayOutcome', 'inParc', 'repairs', 'release'));
    }
}
