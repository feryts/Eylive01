<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\ProfileRepository;

class ProfileService
{
    public function __construct(
        private readonly ProfileRepository $repository
    ) {
    }

    public function profile(User $user): array
    {
        $user = $this->repository->get($user);

        return [

            'id' => $user->id,

            'ey_id' => $user->ey_id,

            'username' => $user->username,

            'avatar' => $user->avatar,

            'bio' => $user->bio,

            'gender' => $user->gender,

            'country' => $user->country,

            'vip_level' => $user->vip_level?->value,

            'followers' => 0,

            'following' => 0,

            'visitors' => 0,

            'wallet' => [

                'coins' => $user->wallet?->coins ?? 0,

                'diamonds' => $user->wallet?->diamonds ?? 0,

            ],

            'agency' => null,

        ];
    }
}
