<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CoordinateController;

Route::fallback(fn() => abort(404, 'The route '. request()->getPathInfo() . ' could not be found.'));

Route::apiResource('coordinates', CoordinateController::class)->only('store', 'show');
