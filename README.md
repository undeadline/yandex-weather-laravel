Yandex weather for Laravel
=========================

```php
$weather = new \Undeadline\YW\YandexWeather(13.823, 72.752, ['lang' => 'ru_RU], 'limit' => 1, 'hours' => true, 'extra' => true);

echo $weather->temperature(); // current temperature
echo $weather->feelsTemperature(); // current feels temperature
echo $weather->icon(); // url for temperature icon
```