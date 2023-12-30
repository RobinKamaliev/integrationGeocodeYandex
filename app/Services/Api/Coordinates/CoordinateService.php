<?php

declare(strict_types=1);

namespace App\Services\Api\Coordinates;

use App\Http\Resources\Coordinate\IndexResource;
use App\Jobs\GeocodingJob;
use App\Models\Coordinate;
use App\Models\User;
use App\Services\Response\StatusRequestService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class CoordinateService
{
    public function saveCoordinates(array $data): JsonResponse
    {
        try {
            $data['user_id'] ?? Auth::user()->id;
            $coordinate = Coordinate::create($data);
        } catch (\Exception) {
            return StatusRequestService::responseBadRequest('coordinate not created');
        }

        GeocodingJob::dispatch($coordinate);

        return StatusRequestService::responseSuccessRequest('задача поставлена');
    }

    public function getCoordinates(array $data, int $userId): JsonResponse|AnonymousResourceCollection
    {
        $fromDateTime = $data['from_datetime'];
        $toDateTime = $data['to_datetime'];
        $paginate = $data['paginate'];

        if (!$user = User::query()->find($userId)) {
            return StatusRequestService::responseBadRequest('user not found');
        }

        try {
            $res = $user->address()
                ->whereBetween('created_at', [$fromDateTime, $toDateTime])
                ->orderBy('created_at', 'desc')
                ->select('address', 'longitude', 'latitude')
                    ->simplePaginate($paginate);
        } catch (\Exception) {
            return StatusRequestService::responseBadRequest('sql');
        }

        return IndexResource::collection($res);
    }
}
