<?php

namespace App\Services;

use App\Helpers\EyHelper;
use App\Models\User;
use App\Models\UserWallet;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function __construct(
        protected AuthRepository $repository
    ) {
    }

    /**
     * Register
     */
    public function register(array $data): array
    {
        return DB::transaction(function () use ($data) {

            $user = $this->repository->create([
                'ey_id'    => EyHelper::generateEyId(),
                'username' => $data['username'],
                'phone'    => $data['phone'],
                'email'    => $data['email'] ?? null,
                'password' => Hash::make($data['password']),
                'gender'   => $data['gender'],
                'country'  => $data['country'] ?? null,
            ]);

            UserWallet::create([
                'user_id' => $user->id,
            ]);

            $token = $this->repository->createToken($user);

            return [
                'user'  => $this->me($user),
                'token' => $token,
            ];
        });
    }

    /**
     * Login
     */
    public function login(array $data): array
    {
        $user = $this->repository->findByPhone($data['phone']);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'phone' => [
                    'Telefon numarası veya şifre hatalı.',
                ],
            ]);
        }

        // Eski tokenları temizle
        $this->repository->deleteAllTokens($user);

        // Son giriş zamanı
        $this->repository->update($user, [
            'last_login_at' => now(),
        ]);

        $token = $this->repository->createToken($user);

        return [
            'user'  => $this->me($user),
            'token' => $token,
        ];
    }

    /**
     * Current User
     */
    public function me(User $user): array
    {
        $user = $this->repository->load($user);

        return [
            'id' => $user->id,
            'ey_id' => $user->ey_id,
            'username' => $user->username,
            'phone' => $user->phone,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'gender' => $user->gender,
            'country' => $user->country,

            'role' => $user->role?->value,
            'status' => $user->status?->value,
            'vip_level' => $user->vip_level?->value,

            'phone_verified' => $user->phone_verified_at !== null,

            'wallet' => [
                'coins' => $user->wallet?->coins ?? 0,
                'diamonds' => $user->wallet?->diamonds ?? 0,
            ],

            // Spatie eklendiğinde otomatik doldurulacak
            'roles' => method_exists($user, 'getRoleNames')
                ? $user->getRoleNames()->values()
                : [],

            'permissions' => method_exists($user, 'getAllPermissions')
                ? $user->getAllPermissions()->pluck('name')->values()
                : [],
        ];
    }

    /**
     * Logout
     */
    public function logout(User $user): void
    {
        $this->repository->deleteCurrentToken($user);
    }
}
