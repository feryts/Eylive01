<?php

namespace App\Models;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Enums\VipLevel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'ey_id',
        'username',
        'phone',
        'email',
        'password',
        'avatar',
        'gender',
        'country',
        'vip_level',
        'role',
        'status',
        'bio',
        'birthday',
        'phone_verified_at',
        'last_login_at',
    ];

    /**
     * Hidden attributes.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute casting.
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'birthday' => 'date',
            'phone_verified_at' => 'datetime',
            'last_login_at' => 'datetime',
            'role' => UserRole::class,
            'status' => UserStatus::class,
            'vip_level' => VipLevel::class,
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function wallet(): HasOne
    {
        return $this->hasOne(UserWallet::class);
    }

    public function walletTransactions(): HasMany
    {
        return $this->hasMany(WalletTransaction::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Helper Methods
    |--------------------------------------------------------------------------
    */

    public function isSuperAdmin(): bool
    {
        return $this->role === UserRole::SUPER_ADMIN;
    }

    public function isAdmin(): bool
    {
        return $this->role === UserRole::ADMIN;
    }

    public function isBroadcaster(): bool
    {
        return $this->role === UserRole::BROADCASTER;
    }

    public function isVip(): bool
    {
        return $this->vip_level !== VipLevel::NONE;
    }

    public function isActive(): bool
    {
        return $this->status === UserStatus::ACTIVE;
    }

    public function isBanned(): bool
    {
        return $this->status === UserStatus::BANNED;
    }
}
