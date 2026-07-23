<?php

namespace App\Helpers;

class EyHelper
{
    public static function generateEyId(int $id): string
    {
        return 'EY'.str_pad($id, 7, '0', STR_PAD_LEFT);
    }
}
