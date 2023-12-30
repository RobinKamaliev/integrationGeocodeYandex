<?php

declare(strict_types=1);

namespace App\Services\Api\Coordinates;

use App\Models\IntegrationKeys;
use Illuminate\Support\Facades\Http;

class YandexGeocodingService
{
    const NAME_KEY = 'geocode_yandex';
    const URL = 'https://geocode-maps.yandex.ru/1.x/';

    public function getAddress($latitude, $longitude): ?string
    {
        $domain = self::URL;

        if ($apiKey = $this->getKey()) {

            $url = "$domain?apikey=$apiKey&format=json&geocode=$longitude,$latitude";

            try {
                $response = Http::get($url)->body();
                $data = json_decode($response, true);
                return $data['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['metaDataProperty']['GeocoderMetaData']['text'];
            } catch (\Exception) {
                return null;
            }
        }

        return null;
    }

    protected function getKey(): ?string
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
