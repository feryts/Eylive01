<?php

namespace App\Repositories;

use App\Models\User;

class ProfileRepository
{
    public function get(User $user): User
    {
        return $user->load([
            'wallet',
        ]);
    }
}
