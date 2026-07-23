<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Agency\JoinAgencyRequest;
use App\Http\Resources\AgencyRequestResource;
use App\Http\Resources\AgencyResource;
use App\Services\AgencyService;
use Illuminate\Http\Request;

class AgencyController extends BaseApiController
{
    public function __construct(
        protected AgencyService $service
    ) {
    }

    /**
     * Aktif ajanslar
     */
    public function index()
    {
        return $this->success(
            AgencyResource::collection(
                $this->service->index()
            )
        );
    }

    /**
     * Ajansa başvur
     */
    public function join(JoinAgencyRequest $request)
    {
        $application = $this->service->join(
            $request->user(),
            $request->integer('agency_id'),
            $request->input('message')
        );

        return $this->success(
            new AgencyRequestResource($application),
            'Başvurunuz başarıyla gönderildi.',
            201
        );
    }
}
