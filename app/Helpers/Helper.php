<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Auth;


class Helper
{
    public static function userVerification(array $roles = []) {
        if(in_array(Auth::user()->role, $roles)) {
            return true;
        }
        return false;
    }

    public static function generateReference(int $length) {
        $characters = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
