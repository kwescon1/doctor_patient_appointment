<?php

namespace App\Actions;

use Illuminate\Support\Facades\Hash;

class HashPassword
{

    public function hashPassword($string): string
    {
        return  Hash::make($string);
    }
}
