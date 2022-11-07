<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Auth;


class Helper
{
    public static function userVerification($roles = []) {
        if(in_array(Auth::user()->role, $roles)) {
            return true;
        }
        return false;
    }
}
