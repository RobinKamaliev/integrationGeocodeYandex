<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Requests\Coordinate\StoreRequest;
use App\Http\Requests\Coordinate\IndexRequest;
use App\Services\Api\Coordinates\CoordinateService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CoordinatesController
{
    public function saveCoordinates(CoordinateService $coordinateService, StoreRequest $request): JsonResponse
    {
        $data = $request->validated();
        return $coordinateService->saveCoordinates($data);
    }

    public function getUserRoute(CoordinateService $coordinateService, IndexRequest $request, int $userId): JsonResponse|AnonymousResourceCollection
    {
        $data = $request->validated();
        return $coordinateService->getCoordinates($data, $userId);
    }
}
