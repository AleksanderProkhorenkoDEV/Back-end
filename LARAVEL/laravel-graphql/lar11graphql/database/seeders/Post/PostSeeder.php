<?php

namespace Database\Seeders\Post;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $users = User::pluck('id')->toArray();

        foreach (range(1, 10) as $index) {
            Post::create([
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'user_id' => $faker->randomElement($users),
            ]);
        }
    }
}
