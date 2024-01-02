<?php

declare(strict_types=1);

namespace App\Services\Api\Coordinates\Yandex;

use App\Models\IntegrationKeys;
use App\Services\Api\Coordinates\Base\Coordinates;
use Illuminate\Support\Facades\Http;

class YandexGeocodingService implements Coordinates
{
    const NAME_KEY = 'geocode_yandex';
    const URL = 'https://geocode-maps.yandex.ru/1.x/';

    public function getAddress(float $latitude, float $longitude): ?string
    {
        $domain = self::URL;

        if ($apiKey = $this->getKey()) {

            $url = "$domain?apikey=$apiKey&format=json&geocode=$longitude,$latitude";

            try {
                $response = Http::get($url)->json();
                return $response['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['metaDataProperty']['GeocoderMetaData']['text'];
            } catch (\Exception) {
                return null;
            }
        }

        return null;
    }

    public function getKey(): ?string
    {
        if ($key = IntegrationKeys::query()
            ->orderBy('created_at', 'desc')
            ->where('name', self::NAME_KEY)
            ->value('key')) {

            return $key;
        }
        return null;
    }
}
