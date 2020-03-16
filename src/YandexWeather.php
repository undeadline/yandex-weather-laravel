<?php

namespace Undeadline\YW;

class YandexWeather
{
    /**
     * Http client instance
     *
     * @var YandexWeatherClient
     */
    private $client;

    /**
     * Result of request
     *
     * @var null
     */
    private $content = null;

    /**
     * YandexWeather constructor.
     * @param float $lat
     * @param float $lon
     * @param array $properties
     */
    public function __construct(float $lat, float $lon, array $properties = [])
    {
        $this->client = new YandexWeatherClient();

        $this->query($lat, $lon, $properties);
    }

    /**
     * Set new latitude and longitude coords with params
     *
     * @param float $lat
     * @param float $lon
     * @param array $properties
     * @return $this
     */
    public function set(float $lat, float $lon, array $properties = [])
    {
        $this->content = null;
        $this->query($lat, $lon, $properties);

        return $this;
    }

    /**
     * Get current temperature
     *
     * @return mixed
     */
    public function temperature()
    {
        return $this->content->fact->temp;
    }

    /**
     * Get feels current temperature
     *
     * @return mixed
     */
    public function feelsTemperature()
    {
        return $this->content->fact->feels_like;
    }

    /**
     * Get icon
     *
     * @return string
     */
    public function icon()
    {
        return "https://yastatic.net/weather/i/icons/blueye/color/svg/{$this->content->fact->icon}.svg";
    }

    /**
     * Return true if request is success and false if fail
     *
     * @return bool
     */
    public function valid()
    {
        return !is_null($this->content) ? true : false;
    }

    /**
     * Get content of body request
     *
     * @return null
     */
    public function content()
    {
        return $this->content;
    }

    public function __get($name)
    {
        if (property_exists($this->content(), $name))
            return $this->content->{$name};

        return null;
    }

    /**
     * Execute for get weather
     *
     * @param float $lat
     * @param float $lon
     * @param array $properties
     */
    private function query(float $lat, float $lon, array $properties = [])
    {
        $query = "lat={$lat}&lon={$lon}" . ($properties ? '&' . http_build_query($properties) : '');

        $response = $this->client->request("/v1/forecast?{$query}");

        if($response)
            $this->content = json_decode($response);
    }
}