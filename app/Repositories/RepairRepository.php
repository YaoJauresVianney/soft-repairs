<?php

namespace App\Repositories;

use App\Models\Repair;
use Carbon\Carbon;

class RepairRepository
{
    private function generateReference(int $length) {
        $characters = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function inParc() {
        return Repair::with('client', 'wrecker', 'peopletype', 'vehiclecategory', 'criterias')
            ->where('date_release', null)
            ->where('state', 'pending')
            ->where('deleted_at', null)
            ->where('archived', 0)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function sixMonths() {
        return Repair::with('client', 'wrecker', 'peopletype', 'vehiclecategory')
            ->where('state', 'pending')
            ->where('deleted_at', null)
            ->where('archived', 1)
            ->orderBy('created_at', 'desc')->get();
    }

    public function all() {
        return Repair::all();
    }

    public function release() {
        return Repair::with('client', 'wrecker', 'peopletype', 'vehiclecategory')
            ->where('state', 'closed')
            ->where('archived', 1)
            ->where('deleted_at', null)
            ->orderBy('date_release', 'desc')
            ->get();
    }
}
