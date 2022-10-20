<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Weather\Weather;
use App\Services\Geolocation\Geolocation;

class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Weather::class, function($app){
            $location = new Geolocation();

            return new Weather($location);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
