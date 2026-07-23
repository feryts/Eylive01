<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [

        'ey_id',

        'first_name',
        'last_name',
        'username',

        'email',
        'phone',

        'password',

        'google_id',
        'apple_id',

        'avatar',

        'birth_date',

        'gender',

        'country',

        'coins',
        'diamonds',

        'vip_level',
        'vip_expired_at',

        'is_broadcaster',
        'agency_id',

        'trust_score',

        'is_banned',

        'last_login_ip',
        'last_login_at',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'phone_verified_at' => 'datetime',
            'vip_expired_at' => 'datetime',
            'last_login_at' => 'datetime',

            'password' => 'hashed',

            'is_broadcaster' => 'boolean',
            'is_banned' => 'boolean',
        ];
    }
}
