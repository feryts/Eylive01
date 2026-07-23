<?php

namespace App\Models;

use App\Enums\WalletTransactionType;
use App\Enums\WalletType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WalletTransaction extends Model
{
    protected $fillable = [

        'user_id',

        'wallet_type',

        'transaction_type',

        'amount',

        'balance_before',

        'balance_after',

        'reference',

        'description',

    ];

    protected $casts = [

        'wallet_type'=>WalletType::class,

        'transaction_type'=>WalletTransactionType::class,

    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
