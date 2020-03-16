Yandex weather for Laravel
=========================

```php
$latitude = 15.8921;
$longitude = 82.78821;
$params = [
    'lang' => 'ru_RU', // response language 
    'limit' => 1, // forecast period
    'hours' => true, // response is contains horly period
    'extra' => true // detailed precipitation forecast
];

$weather = new \Undeadline\YW\YandexWeather($latitude, $longitude, $params);

echo $weather->temperature(); // current temperature
echo $weather->feelsTemperature(); // current feels temperature
echo $weather->icon(); // url for temperature icon
```