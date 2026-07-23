<?php

namespace App\Services;

use App\Enums\WalletTransactionType;
use App\Enums\WalletType;
use App\Models\User;
use App\Repositories\WalletRepository;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class WalletService
{
    public function __construct(
        protected WalletRepository $repository
    ) {
    }

    /**
     * Coin Ekle
     */
    public function addCoins(
        User $user,
        int $amount,
        WalletTransactionType $type,
        ?string $reference = null,
        ?string $description = null
    ): void {

        DB::transaction(function () use (
            $user,
            $amount,
            $type,
            $reference,
            $description
        ) {

            $wallet = $this->repository->wallet($user);

            $before = $wallet->coins;

            $wallet->increment('coins', $amount);

            $wallet->refresh();

            $this->repository->transaction([
                'user_id' => $user->id,
                'wallet_type' => WalletType::COIN,
                'transaction_type' => $type,
                'amount' => $amount,
                'balance_before' => $before,
                'balance_after' => $wallet->coins,
                'reference' => $reference,
                'description' => $description,
            ]);

        });
    }

    /**
     * Coin Düş
     */
    public function removeCoins(
        User $user,
        int $amount,
        WalletTransactionType $type,
        ?string $reference = null,
        ?string $description = null
    ): void {

        DB::transaction(function () use (
            $user,
            $amount,
            $type,
            $reference,
            $description
        ) {

            $wallet = $this->repository->wallet($user);

            if ($wallet->coins < $amount) {
                throw new RuntimeException('Yetersiz Coin.');
            }

            $before = $wallet->coins;

            $wallet->decrement('coins', $amount);

            $wallet->refresh();

            $this->repository->transaction([
                'user_id' => $user->id,
                'wallet_type' => WalletType::COIN,
                'transaction_type' => $type,
                'amount' => $amount,
                'balance_before' => $before,
                'balance_after' => $wallet->coins,
                'reference' => $reference,
                'description' => $description,
            ]);

        });
    }

    /**
     * Diamond Ekle
     */
    public function addDiamonds(
        User $user,
        int $amount,
        WalletTransactionType $type,
        ?string $reference = null,
        ?string $description = null
    ): void {

        DB::transaction(function () use (
            $user,
            $amount,
            $type,
            $reference,
            $description
        ) {

            $wallet = $this->repository->wallet($user);

            $before = $wallet->diamonds;

            $wallet->increment('diamonds', $amount);

            $wallet->refresh();

            $this->repository->transaction([
                'user_id' => $user->id,
                'wallet_type' => WalletType::DIAMOND,
                'transaction_type' => $type,
                'amount' => $amount,
                'balance_before' => $before,
                'balance_after' => $wallet->diamonds,
                'reference' => $reference,
                'description' => $description,
            ]);

        });
    }

    /**
     * Diamond Düş
     */
    public function removeDiamonds(
        User $user,
        int $amount,
        WalletTransactionType $type,
        ?string $reference = null,
        ?string $description = null
    ): void {

        DB::transaction(function () use (
            $user,
            $amount,
            $type,
            $reference,
            $description
        ) {

            $wallet = $this->repository->wallet($user);

            if ($wallet->diamonds < $amount) {
                throw new RuntimeException('Yetersiz Diamond.');
            }

            $before = $wallet->diamonds;

            $wallet->decrement('diamonds', $amount);

            $wallet->refresh();

            $this->repository->transaction([
                'user_id' => $user->id,
                'wallet_type' => WalletType::DIAMOND,
                'transaction_type' => $type,
                'amount' => $amount,
                'balance_before' => $before,
                'balance_after' => $wallet->diamonds,
                'reference' => $reference,
                'description' => $description,
            ]);

        });
    }
}
