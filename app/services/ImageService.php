<?php

namespace App\Services;

class ImageService
{
    public static function exists($file) {
        if (file_exists("images/" . $file)) {
            return true;
        }
        return false;
    }
}

