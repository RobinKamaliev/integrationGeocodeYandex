<?php

declare(strict_types=1);

namespace App\Services\Api\Auth;

use App\Models\User;
use App\Services\Response\StatusRequestService;
use Illuminate\Http\JsonResponse;

class AuthService
{
    public function login(array $data): JsonResponse
    {
        if (!$token = auth()->attempt($data)) {
            return StatusRequestService::responseUnauthorizedRequest();
        }

        return $this->respondWithToken($token);
    }

    public function createUser(array $data): JsonResponse
    {
        try {
            $user = User::query()->create($data);
        } catch (\Exception) {
            return StatusRequestService::responseBadRequest('User not created');
        }
        $token = auth()->login($user);

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token): JsonResponse
    {
        return StatusRequestService::responseSuccessRequest([
            'access_token' => $token,
            'refresh_token ' => \auth()->refresh(),
        ]);
    }
}
