<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ProfileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(
        private readonly ProfileService $service
    ) {
    }

    public function index(Request $request): JsonResponse
    {
        return response()->json([

            'success' => true,

            'data' => $this->service->profile(
                $request->user()
            ),

        ]);
    }
}
