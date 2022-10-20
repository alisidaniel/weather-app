<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LocationRequest;
use App\Services\Weather\Weather;


class ApiController extends Controller
{
    /**
     * @param \App\Http\Requests\LocationRequest $req
     * @param \App\Services\Weather\Weather $weather
     * 
     * @return array<string|mixed> 
     */
    public function search(LocationRequest $req, Weather $weather)
    {
        $result = $weather->info($req);
        
        return $result;
    }

}