<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserWallet;
use App\Models\WalletTransaction;

class WalletRepository
{
    /**
     * Wallet'ı kilitleyerek getir.
     */
    public function wallet(User $user): UserWallet
    {
        return UserWallet::query()
            ->where('user_id', $user->id)
            ->lockForUpdate()
            ->firstOrFail();
    }

    /**
     * İşlem kaydı oluştur.
     */
    public function transaction(array $data): WalletTransaction
    {
        return WalletTransaction::create($data);
    }

    /**
     * İşlem geçmişi.
     */
    public function history(User $user)
    {
        return WalletTransaction::query()
            ->where('user_id', $user->id)
            ->latest();
    }
}
