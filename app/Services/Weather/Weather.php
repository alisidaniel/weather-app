<?php

namespace App\Services\Weather;

use Illuminate\Http\Request;
use App\Services\Geolocation\Geolocation;
use Illuminate\Support\Facades\Http;

class Weather
{
    private $location;

    /**
     * @var Geolocation
     */
    public function __construct(Geolocation $location) 
    {
        $this->location = $location;
    }

    public function info(Request $req)
    {  
        $location = $this->location->search($req->location);
 
        if (count($location) == 0) return [];

        $obj = (object)$location[0]; 
        
        $response = Http::get(env('WEATHER_BASE_URL').'lat='.$obj->lat.'&lon='.$obj->lon.'&exclude=&appid='.env('WEATHER_API_KEY'));

        if ($response->failed()) {
            throw new \Exception("Error Processing Request", 400);
        }
        
        return $response->json();
    }
}