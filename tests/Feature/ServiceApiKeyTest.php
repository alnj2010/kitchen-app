<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceApiKeyTest extends TestCase
{
  
    public function test_fail_without_api_key(): void
    {
        $response = $this->postJson('/api/orders');

        $response->assertStatus(403);
    }

    public function test_fail_with_wrong_api_key(): void
    {
        $response = $this->postJson('/api/orders', [], [
            'X-API-Key' => 'a-wrong-key'
        ]);

        $response->assertStatus(403);
    }

    public function test_success_with_corrent_api_key(): void
    {
        $response = $this->postJson('/api/orders', [], [
            'X-API-Key' => config('app.service_api_key')
        ]);

        $response->assertStatus(201);
    }
}
