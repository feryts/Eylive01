<?php

namespace App\Repositories;

use App\Models\User;

class AuthRepository
{
    /**
     * Find user by phone number.
     */
    public function findByPhone(string $phone): ?User
    {
        return User::where('phone', $phone)->first();
    }

    /**
     * Create a new user.
     */
    public function create(array $data): User
    {
        return User::create($data);
    }

    /**
     * Load user relations.
     */
    public function load(User $user): User
    {
        return $user->loadMissing('wallet');
    }

    /**
     * Update user.
     */
    public function update(User $user, array $data): bool
    {
        return $user->update($data);
    }

    /**
     * Delete current access token.
     */
    public function deleteCurrentToken(User $user): void
    {
        $user->currentAccessToken()?->delete();
    }

    /**
     * Delete all access tokens.
     */
    public function deleteAllTokens(User $user): void
    {
        $user->tokens()->delete();
    }

    /**
     * Create Sanctum token.
     */
    public function createToken(User $user, string $name = 'mobile'): string
    {
        return $user->createToken($name)->plainTextToken;
    }
}
