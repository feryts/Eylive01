<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\WalletTransaction;

class WalletRepository
{
    public function wallet(User $user)
    {
        return $user->wallet;
    }

    public function transaction(array $data): WalletTransaction
    {
        return WalletTransaction::create($data);
    }
}
