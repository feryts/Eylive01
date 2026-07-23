<?php

namespace App\Services;

use App\Helpers\EyHelper;
use App\Models\User;
use App\Models\UserWallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * Register new user.
     */
    public function register(array $data): array
    {
        return DB::transaction(function () use ($data) {

            $user = User::create([
                'ey_id'     => EyHelper::generateEyId(),
                'username'  => $data['username'],
                'phone'     => $data['phone'],
                'email'     => $data['email'] ?? null,
                'password'  => Hash::make($data['password']),
                'gender'    => $data['gender'],
                'country'   => $data['country'] ?? null,
            ]);

            UserWallet::create([
                'user_id' => $user->id,
            ]);

            $token = $user->createToken('mobile')->plainTextToken;

            return [
                'user' => $user->load('wallet'),
                'token' => $token,
            ];
        });
    }

    /**
     * Login user.
     */
    public function login(array $data): array
    {
        $user = User::where('phone', $data['phone'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw new \Exception('Telefon numarası veya şifre hatalı.');
        }

        $user->update([
            'last_login_at' => now(),
        ]);

        $token = $user->createToken('mobile')->plainTextToken;

        return [
            'user' => $user->load('wallet'),
            'token' => $token,
        ];
    }

    /**
     * Logout current token.
     */
    public function logout(User $user): void
    {
        $user->currentAccessToken()?->delete();
    }
}
