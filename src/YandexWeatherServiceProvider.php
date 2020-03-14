<?php

namespace Undeadline\YW;

use Illuminate\Support\ServiceProvider;

class YandexWeatherServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/config.php', 'yandex-weather'
        );

        $this->app->bind(YandexWeather::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/config.php' => config_path('yandex-weather.php')
        ]);
    }
}