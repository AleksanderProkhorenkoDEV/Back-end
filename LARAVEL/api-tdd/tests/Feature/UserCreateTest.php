<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserCreateTest extends TestCase
{
    /** @test */
    public function UserCreateTest(): void
    {
        // Actuar: Hacer una solicitud POST a la ruta de creación de usuario
        $response = $this->postJson('/api/create', [
            'name' => 'Aleks',
            'lastname' => 'Doe need more characters',
            'email' => 'paco23@example.com',
            'password' => 'password123',
            'phone' => '123456789',
        ]);

        // Afirmar: Verificar que la respuesta sea correcta
        $response->assertStatus(201)
            ->assertJson([
                'message' => 'El usuario ha sido creado correctamente.',
                'user' => [
                    'name' => 'Aleks',
                    'lastname' => 'Doe need more characters',
                    'email' => 'paco23@example.com',
                    'phone' => '123456789',
                ],
            ]);

        // Afirmar: Verificar que el usuario fue creado en la base de datos
        $this->assertDatabaseHas('users', [
            'email' => 'Aleks@example.com',
        ]);
    }
}
