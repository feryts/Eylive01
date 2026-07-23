<?php

namespace App\Repositories;

use App\Models\Agency;
use App\Models\AgencyLog;
use App\Models\AgencyMember;
use App\Models\AgencyRequest;
use App\Models\User;

class AgencyRepository
{
    /**
     * Aktif ajanslar.
     */
    public function all()
    {
        return Agency::query()
            ->where('is_active', true)
            ->with('owner')
            ->orderBy('name');
    }

    /**
     * Ajans bul.
     */
    public function find(int $id): ?Agency
    {
        return Agency::find($id);
    }

    /**
     * Kullanıcının aktif üyeliği.
     */
    public function member(User $user): ?AgencyMember
    {
        return AgencyMember::query()
            ->where('user_id', $user->id)
            ->where('is_active', true)
            ->first();
    }

    /**
     * Bekleyen başvuru.
     */
    public function pending(User $user): ?AgencyRequest
    {
        return AgencyRequest::query()
            ->where('user_id', $user->id)
            ->where('status', 'PENDING')
            ->first();
    }

    /**
     * Başvuru oluştur.
     */
    public function createRequest(array $data): AgencyRequest
    {
        return AgencyRequest::create($data);
    }

    /**
     * Üye oluştur.
     */
    public function createMember(array $data): AgencyMember
    {
        return AgencyMember::create($data);
    }

    /**
     * Log oluştur.
     */
    public function log(array $data): AgencyLog
    {
        return AgencyLog::create($data);
    }

    /**
     * Üye sayısını güncelle.
     */
    public function refreshMembers(Agency $agency): void
    {
        $agency->update([
            'members_count' => AgencyMember::where('agency_id', $agency->id)
                ->where('is_active', true)
                ->count(),
        ]);
    }
}
