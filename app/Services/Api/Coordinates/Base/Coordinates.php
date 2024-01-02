<?php

declare(strict_types=1);

namespace App\Services\Api\Coordinates\Base;

interface Coordinates
{
    public function getAddress(float $latitude, float $longitude): ?string;
    public function getKey(): ?string;
}
