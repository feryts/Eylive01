<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\WalletResource;
use App\Http\Resources\WalletTransactionResource;
use App\Services\WalletService;
use Illuminate\Http\Request;

class WalletController extends BaseApiController
{
    public function __construct(
        protected WalletService $service
    ) {
    }

    /**
     * Wallet
     */
    public function index(Request $request)
    {
        return $this->success(

            new WalletResource(
                $request->user()->wallet
            )

        );
    }

    /**
     * Wallet History
     */
    public function history(Request $request)
    {
        $transactions = $request
            ->user()
            ->walletTransactions()
            ->latest()
            ->paginate(20);

        return $this->success(

            WalletTransactionResource::collection(
                $transactions
            )

        );
    }
}
