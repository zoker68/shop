<?php

namespace Zoker\Shop\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;
use Zoker\Shop\Enums\MoySkladEndPoints;
use Zoker\Shop\Models\SyncLog;

class MoySklad
{
    public static function request($method, MoySkladEndPoints $endPoint, $params = [], $options = [])
    {
        $client = new Client;

        $uri = $endPoint->value . '?' . http_build_query($params);

        $start = microtime(true);

        $response = $client->request($method, $uri, array_merge([
            'headers' => [
                'Authorization' => 'Basic ' . config('services.moysklad.auth'),
                'Accept-Encoding' => 'gzip',
            ],
        ], $options));
        $end = microtime(true);
        try {

            SyncLog::create([
                'service' => 'moysklad',
                'method' => $method,
                'uri' => $uri,
                'response' => $response->getBody(),
                'code' => $response->getStatusCode(),
                'query_time' => $end - $start,
            ]);

        } catch (RequestException $e) {
            Log::error($e->getMessage());
        }

        return $response;
    }

    public static function getCategories()
    {
        $response = static::request('GET', MoySkladEndPoints::CATEGORIES);

        return json_decode((string) $response->getBody());
    }

    public static function getProducts($offset = 0)
    {
        $options = [
            'offset' => $offset,
            'filter' => 'stockMode=positiveOnly',
        ];

        $response = static::request('GET', MoySkladEndPoints::PRODUCTS, $options);

        return json_decode((string) $response->getBody());
    }
}
