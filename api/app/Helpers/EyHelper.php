<?php

namespace App\Helpers;

use App\Models\User;

class EyHelper
{
    /**
     * Generate unique EyLive ID.
     *
     * Format:
     * EY0000001
     * EY0000002
     */
    public static function generateEyId(): string
    {
        do {

            $lastId = User::max('id') + 1;

            $eyId = 'EY' . str_pad(
                $lastId,
                7,
                '0',
                STR_PAD_LEFT
            );

        } while (
            User::where('ey_id', $eyId)->exists()
        );

        return $eyId;
    }
}
