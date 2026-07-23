<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserWallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'coins',
        'diamonds',
    ];

    protected $casts = [
        'coins' => 'integer',
        'diamonds' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function addCoins(int $amount): void
    {
        $this->increment('coins', $amount);
    }

    public function removeCoins(int $amount): void
    {
        $this->decrement('coins', $amount);
    }

    public function addDiamonds(int $amount): void
    {
        $this->increment('diamonds', $amount);
    }

    public function removeDiamonds(int $amount): void
    {
        $this->decrement('diamonds', $amount);
    }
}
