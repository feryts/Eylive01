<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserWallet extends Model
{
    protected $table = 'user_wallets';

    protected $fillable = [
        'user_id',
        'coins',
        'diamonds',
        'total_recharge',
        'total_sent',
        'total_received',
    ];

    protected $casts = [
        'coins' => 'integer',
        'diamonds' => 'integer',
        'total_recharge' => 'integer',
        'total_sent' => 'integer',
        'total_received' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
