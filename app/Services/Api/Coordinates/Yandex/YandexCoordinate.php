<?php

declare(strict_types=1);

namespace App\Services\Api\Coordinates\Yandex;

use App\Services\Api\Coordinates\Base\BaseCoordinateService;

class YandexCoordinate extends BaseCoordinateService
{
    public function __construct()
    {
        $this->coordinates = new YandexGeocodingService();
    }

    public function getAddress(float $latitude, float $longitude): ?string
    {
        return $this->performGetAddress($latitude, $longitude);
    }

    public function getKey(): ?string
    {
        return $this->performGetKey();
    }
}
