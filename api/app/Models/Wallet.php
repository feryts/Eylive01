<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [

        'user_id',

        'coins',

        'diamonds',

        'total_recharge',

        'total_spent',

        'total_received',

    ];

    protected $casts = [

        'coins' => 'integer',

        'diamonds' => 'integer',

        'total_recharge' => 'integer',

        'total_spent' => 'integer',

        'total_received' => 'integer',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
