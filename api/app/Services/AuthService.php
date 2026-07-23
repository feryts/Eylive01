<?php

namespace App\Services;

use App\Helpers\EyHelper;
use App\Models\User;
use App\Models\UserWallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    /**
     * Register
     */
    public function register(array $data): array
    {
        return DB::transaction(function () use ($data) {

            $user = User::create([
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

            $token = $user->createToken('mobile')->plainTextToken;

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
        $user = User::where('phone', $data['phone'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'phone' => ['Telefon numarası veya şifre hatalı.'],
            ]);
        }

        $user->update([
            'last_login_at' => now(),
        ]);

        $token = $user->createToken('mobile')->plainTextToken;

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
        $user->loadMissing('wallet');

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

            'phone_verified' => !is_null($user->phone_verified_at),

            'wallet' => [
                'coins' => $user->wallet?->coins ?? 0,
                'diamonds' => $user->wallet?->diamonds ?? 0,
            ],

            // Permission sistemi eklenince burası doldurulacak.
            'permissions' => [],
        ];
    }

    /**
     * Logout
     */
    public function logout(User $user): void
    {
        $user->currentAccessToken()?->delete();
    }
}
