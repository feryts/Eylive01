<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AgencyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'name' => $this->name,

            'logo' => $this->logo,

            'description' => $this->description,

            'members_count' => $this->members_count,

            'total_income' => $this->total_income,

            'owner' => [

                'id' => $this->owner?->id,

                'ey_id' => $this->owner?->ey_id,

                'username' => $this->owner?->username,

                'avatar' => $this->owner?->avatar,

            ],

        ];
    }
}
