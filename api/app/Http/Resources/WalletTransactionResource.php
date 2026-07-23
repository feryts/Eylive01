<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletTransactionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [

            'id'=>$this->id,

            'wallet_type'=>$this->wallet_type,

            'transaction_type'=>$this->transaction_type,

            'amount'=>$this->amount,

            'balance_before'=>$this->balance_before,

            'balance_after'=>$this->balance_after,

            'reference'=>$this->reference,

            'description'=>$this->description,

            'created_at'=>$this->created_at,

        ];
    }
}
