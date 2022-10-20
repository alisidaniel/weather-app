<?php

namespace App\Services\Geolocation;

use Illuminate\Support\Facades\Http;

class Geolocation
{
    public function search(string $name)
    {
        $response = Http::get(env('WEATHER_GEOCODING_DIRECT_URL').'q='.$name.'&limit=5&appid='.env('WEATHER_API_KEY'));
        if ($response->failed()) {
            throw new \Exception("Error Processing Request", 400);
        }
        return $response->json(); 
    }
}