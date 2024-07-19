<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRequestTest extends TestCase
{
    /** @test */
    public function FieldUserTest(): void
    {
        $response = $this->postJson('/api/create', [
            'name' => '',
            'lastname' => '',
            'email' => '',
            'password' => '',
            'phone' => '',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['name', 'lastname', 'email', 'phone']);
    }

    /** @test */
    public function EmailUniqueUserTest(): void
    {
        $response = $this->postJson('/api/create', [
            'name' => 'aleksander',
            'lastname' => 'fernandez',
            'email' => 'agp2@example.com',
            'password' => 'a35sd1',
            'phone' => '123456789',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['email']);
    }

    /** @test */
    public function MinLenghtUserTest(): void
    {
        $response = $this->postJson('/api/create', [
            'name' => '21',
            'lastname' => '12',
            'email' => 'pepe@example.com',
            'password' => 'a35sd1',
            'phone' => '23',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['phone', 'name', 'lastname']);
    }
}
