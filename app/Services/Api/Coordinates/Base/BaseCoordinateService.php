<?php

declare(strict_types=1);

namespace App\Services\Api\Coordinates\Base;

abstract class BaseCoordinateService implements Coordinates
{
    protected Coordinates $coordinates;

    protected function performGetAddress(float $latitude, float $longitude): ?string
    {
        return $this->coordinates->getAddress($latitude, $longitude);
    }

    protected function performGetKey(): ?string
    {
        return $this->coordinates->getKey();
    }
}
