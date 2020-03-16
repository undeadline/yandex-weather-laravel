<?php

require_once 'vendor/autoload.php';
$latitude = 15.8921;
$longitude = 82.78821;
$params = [
    'lang' => 'ru_RU', // response language
    'limit' => 1, // forecast period
    'hours' => false, // response is contains horly period
    'extra' => false // detailed precipitation forecast
];
$a = new \Undeadline\YW\YandexWeather($latitude, $longitude, $params);
dd($a->forecasts);