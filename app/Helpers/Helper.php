<?php

namespace App\Helpers;

class Helper
{
    public static function trimNumber($category) {
        if (preg_match('/\d+/', $category, $matches)) {
            return false;
        } else {
            return $category;
        }
    }
}
