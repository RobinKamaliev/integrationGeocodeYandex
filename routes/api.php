<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CoordinateController;
use App\Http\Controllers\Api\Auth\AuthController;

Route::fallback(fn() => abort(404, 'The route ' . request()->getPathInfo() . ' could not be found.'));

Route::middleware('auth:api')->group(function () {
    Route::apiResource('coordinates', CoordinateController::class)->only('store', 'show');
    //
});

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});
