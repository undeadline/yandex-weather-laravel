<?php

namespace Undeadline\YW;

use Illuminate\Support\Facades\Facade;

class YandexWeatherFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return YandexWeather::class;
    }
}