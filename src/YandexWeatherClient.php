<?php

namespace Undeadline\YW;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class YandexWeatherClient
{
    /**
     * Instance of http client for requests
     *
     * @var Client
     */
    private $client;

    /**
     * YandexWeatherClient constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            "base_uri" => app()->has('config')
                ? config('yandex-weather.api_key')
                : "https://api.weather.yandex.ru/",
            "headers" => app()->has('config')
                ? ["X-Yandex-API-Key" => config('yandex-weather.api_key')]
                : ["X-Yandex-API-Key" => "344f296d-615f-4099-875a-282bc06c7f45"]
        ]);
    }

    /**
     * Method for request execute
     *
     * @param $uri
     * @param string $type
     * @param array $headers
     * @return string|null
     */
    public function request($uri, $type = "GET", $headers = [])
    {
        try {
            $response = $this->client->request($type, $uri, [
                "headers" => $headers
            ]);

            return $response->getBody()->getContents();

        } catch(RequestException $e) {
            Log::error($e->getMessage());
            return null;
        }
    }
}