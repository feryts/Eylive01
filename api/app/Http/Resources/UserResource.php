<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'ey_id' => $this->ey_id,

            'username' => $this->username,

            'phone' => $this->phone,

            'email' => $this->email,

            'avatar' => $this->avatar,

            'bio' => $this->bio,

            'gender' => $this->gender,

            'country' => $this->country,

            'birthday' => $this->birthday,

            'role' => $this->role?->value,

            'status' => $this->status?->value,

            'vip_level' => $this->vip_level?->value,

            'phone_verified' => !is_null($this->phone_verified_at),

            'last_login_at' => $this->last_login_at,

            'wallet' => [

                'coins' => $this->wallet?->coins ?? 0,

                'diamonds' => $this->wallet?->diamonds ?? 0,

            ],

            'roles' => method_exists($this, 'getRoleNames')
                ? $this->getRoleNames()->values()
                : [],

            'permissions' => method_exists($this, 'getAllPermissions')
                ? $this->getAllPermissions()->pluck('name')->values()
                : [],

            'created_at' => $this->created_at,

        ];
    }
}
