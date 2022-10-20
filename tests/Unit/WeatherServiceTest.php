<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\Weather\Weather;
use Mockery;
use Mockery\MockInterface;

class WeatherServiceTest extends TestCase
{
    /**
     * 
     *
     * @return void
     */
    public function test_weather_service_test()
    {
        $this->instance(
            Weather::class,
            Mockery::mock(Weather::class, function (MockInterface $mock) {
                $mock->shouldReceive('info')->once();
            })
        );

        $this->postJson('/api/search', ['location' => 'London']);
    }
}
