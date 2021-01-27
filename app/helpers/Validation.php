<?php

namespace App\Helpers;

class Validation
{
    public static function cleanup($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
