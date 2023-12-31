<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Coordinate;
use App\Models\User;
use App\Services\Api\Coordinates\CoordinateService;
use App\Services\Response\StatusRequestService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CoordinateTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_coordinates(): void
    {
        $user = User::factory()->create();

        $countCreatedCoordinates = 5;
        $coordinates = Coordinate::factory($countCreatedCoordinates)->create([
            'user_id' => $user->id
        ]);

        $data = [
            'from_datetime' => $coordinates->first()->created_at->format('Y-m-d H:i:s'),
            'to_datetime' => $coordinates->first()->created_at->format('Y-m-d H:i:s'),
            'paginate' => $countCreatedCoordinates
        ];

        $productService = new CoordinateService();
        $countCreatedCoordinates = Coordinate::query()->count();
        $countGetCoordinates = $productService->getCoordinates($data, $user->id)->count();

        $this->assertEquals($countCreatedCoordinates, $countGetCoordinates);
    }

    public function test_get_coordinates_paginate(): void
    {
        $user = User::factory()->create();

        $countCreatedCoordinates = 5;
        $coordinates = Coordinate::factory($countCreatedCoordinates)->create([
            'user_id' => $user->id
        ]);

        $paginate = 2;
        $data = [
            'from_datetime' => $coordinates->first()->created_at->format('Y-m-d H:i:s'),
            'to_datetime' => $coordinates->first()->created_at->format('Y-m-d H:i:s'),
            'paginate' => $paginate
        ];

        $productService = new CoordinateService();
        $countGetCoordinates = $productService->getCoordinates($data, $user->id)->count();

        $this->assertEquals($paginate, $countGetCoordinates);
        $this->assertNotEquals($paginate, $countCreatedCoordinates);
    }

    public function test_status_code(): void
    {
        $user = User::factory()->create();

        $countCreatedCoordinates = 5;
        $coordinates = Coordinate::factory($countCreatedCoordinates)->create([
            'user_id' => $user->id
        ]);

        $paginate = 2;
        $data = [
            'from_datetime' => $coordinates->first()->created_at->format('Y-m-d H:i:s'),
            'to_datetime' => $coordinates->first()->created_at->format('Y-m-d H:i:s'),
            'paginate' => $paginate
        ];

        $productService = new CoordinateService();
        $countGetCoordinates = $productService->getCoordinates($data, -1);
        $baseResult = StatusRequestService::responseBadRequest('user not found');

        $this->assertEquals($countGetCoordinates->getOriginalContent(), $baseResult->getOriginalContent());
    }

    //
}
