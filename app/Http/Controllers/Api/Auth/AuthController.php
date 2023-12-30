<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Services\Api\Auth\AuthService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function login(LoginRequest $request, AuthService $authService): JsonResponse
    {
        return $authService->login($request->validated());
    }

    public function register(RegisterRequest $request, AuthService $authService): JsonResponse
    {
        return $authService->createUser($request->validated());
    }
}
