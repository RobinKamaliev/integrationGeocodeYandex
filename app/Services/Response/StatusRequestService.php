<?php

declare(strict_types=1);

namespace App\Services\Response;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class StatusRequestService
{
    public static function responseBadRequest(string $error): JsonResponse
    {
        return response()
            ->json(['error' => $error])
            ->setStatusCode(Response::HTTP_NOT_FOUND);
    }

    public static function responseSuccessRequest(string $message): JsonResponse
    {
        return response()
            ->json(['message' => $message])
            ->setStatusCode(Response::HTTP_OK);
    }

    public static function responseUnauthorizedRequest(): JsonResponse
    {
        return response()
            ->json(['error' => 'Unauthorized'])
            ->setStatusCode(Response::HTTP_UNAUTHORIZED);
    }
}
