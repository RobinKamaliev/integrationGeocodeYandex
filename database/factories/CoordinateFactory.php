<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoordinateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'latitude' => rand(100, 2000),
            'longitude' => rand(100, 2000),
            'user_id' => User::query()->first(),
        ];
    }
}
