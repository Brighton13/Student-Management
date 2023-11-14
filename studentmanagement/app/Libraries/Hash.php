<?php

namespace App\Libraries;

class Hash
{

    public static function encrypt($String)
    {
        return password_hash($String, PASSWORD_BCRYPT);
    }
}