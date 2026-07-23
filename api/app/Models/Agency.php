<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'description',
        'owner_id',
        'is_active',
        'members_count',
        'total_income',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'members_count' => 'integer',
        'total_income' => 'integer',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function members(): HasMany
    {
        return $this->hasMany(AgencyMember::class);
    }

    public function requests(): HasMany
    {
        return $this->hasMany(AgencyRequest::class);
    }

    public function logs(): HasMany
    {
        return $this->hasMany(AgencyLog::class);
    }
}
