<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Usuario Ejemplo',
            'email' => 'usuario@example.com',
            'phone' => '1234567890',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'Usuario Ejemplo2',
            'email' => 'usuario2@gmail.com',
            'phone' => '1234567890',
            'password' => bcrypt('password2'),
        ]);
        User::create([
            'name' => 'Usuario Ejemplo3',
            'email' => 'usuario3@hotmail.com',
            'phone' => '1234567890',
            'password' => bcrypt('password3'),
        ]);
        User::create([
            'name' => 'Usuario Ejemplo4',
            'email' => 'usuario4@geducan.com',
            'phone' => '1234567890',
            'password' => bcrypt('password4'),
        ]);
    }
}
