<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AgencyRequestResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'status' => $this->status,

            'message' => $this->message,

            'reviewed_at' => $this->reviewed_at,

            'agency' => new AgencyResource(
                $this->whenLoaded('agency')
            ),

            'created_at' => $this->created_at,

        ];
    }
}
