<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * 
     *
     * @return void
     */
    public function test_search_api_failed_validation()
    {
        $response = $this->postJson('/api/search', ['wrong_field' => 'validate']);

        $response->assertUnprocessable();
    }

    /**
     * 
     *
     * @return void
     */
    public function test_search_api_successful()
    {
        $response = $this->postJson('/api/search', ['location' => 'London']);

        $response->assertStatus(200);

        $this->assertArrayHasKey('lat', $response->json());
        $this->assertArrayHasKey('lon', $response->json());
        $this->assertArrayHasKey('timezone', $response->json());
    }
}
