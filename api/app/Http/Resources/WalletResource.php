<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [

            'coins' => $this->coins,

            'diamonds' => $this->diamonds,

            'updated_at' => $this->updated_at,

        ];
    }
}
