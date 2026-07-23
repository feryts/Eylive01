<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\AgencyRepository;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class AgencyService
{
    public function __construct(
        protected AgencyRepository $repository
    ) {
    }

    /**
     * Ajans listesi.
     */
    public function index()
    {
        return $this->repository
            ->all()
            ->paginate(20);
    }

    /**
     * Başvuru gönder.
     */
    public function join(User $user, int $agencyId, ?string $message = null)
    {
        if ($this->repository->member($user)) {
            throw new RuntimeException('Zaten bir ajansa bağlısınız.');
        }

        if ($this->repository->pending($user)) {
            throw new RuntimeException('Bekleyen başvurunuz bulunmaktadır.');
        }

        $agency = $this->repository->find($agencyId);

        if (!$agency) {
            throw new RuntimeException('Ajans bulunamadı.');
        }

        return DB::transaction(function () use (
            $agency,
            $user,
            $message
        ) {

            $request = $this->repository->createRequest([
                'agency_id' => $agency->id,
                'user_id' => $user->id,
                'message' => $message,
            ]);

            $this->repository->log([
                'agency_id' => $agency->id,
                'user_id' => $user->id,
                'action' => 'JOIN_REQUEST',
                'data' => [
                    'request_id' => $request->id,
                ],
            ]);

            return $request;
        });
    }
}
