<?php

namespace Tests\Feature;

use Tests\TestCase;

class StationsApiTest extends TestCase
{
    public function test_fails_without_api_key(): void
    {
        $response = $this->getJson('/api/stations');

        $response->assertStatus(401);
    }

    public function test_fails_with_wrong_api_key(): void
    {
        $response = $this->getJson('/api/stations', [
            'Authorization' => 'Bearer wrong',
        ]);

        $response->assertStatus(401);
    }

    public function test_passes_with_correct_api_key(): void
    {
        $response = $this->getJson('/api/stations', [
            'Authorization' => 'Bearer 1|CiOEgDleUYkQfwDZ5Fz1KiWUhJw7Uvj3d42aEw5949b86c95',
        ]);

        $response->assertStatus(200);
    }
}
