<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Models\Coordinate;
use App\Services\Api\Coordinates\YandexGeocodingService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GeocodingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Coordinate $coordinate;

    public function __construct(Coordinate $coordinate)
    {
        $this->coordinate = $coordinate;
    }

    public function handle(YandexGeocodingService $geocodingService): void
    {
        if ($address = $geocodingService->getAddress($this->coordinate->latitude, $this->coordinate->longitude)) {
            $this->coordinate->update(['address' => $address]);
        }
    }
}
