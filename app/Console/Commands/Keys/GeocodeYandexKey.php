<?php

declare(strict_types=1);

namespace App\Console\Commands\Keys;

use App\Models\IntegrationKeys;
use App\Services\Api\Coordinates\Yandex\YandexGeocodingService;
use Illuminate\Console\Command;

class GeocodeYandexKey extends Command
{
    protected $signature = 'add-key:geocode-yandex';

    protected $description = 'create key for integration geocode yandex';

    public function handle(): void
    {
        $key = $this->ask('enter key for geocode-yandex');
        $nameIntegration = YandexGeocodingService::NAME_KEY;
        try {
            IntegrationKeys::create([
                'name' => $nameIntegration,
                'key' => $key,
            ]);
            print_r("key: $key для $nameIntegration добавлен.");
        } catch (\Exception) {
            print_r('ошибка');
        }
    }
}
