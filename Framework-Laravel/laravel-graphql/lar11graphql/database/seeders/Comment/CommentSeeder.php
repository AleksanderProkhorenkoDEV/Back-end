<?php

namespace Database\Seeders\Comment;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Faker\Factory;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $posts = Post::pluck('id')->toArray();
        $users = User::pluck('id')->toArray();

        foreach (range(3, 10) as $index) {
            Comment::create([
                'message' => $faker->paragraph,
                'post_id' => $faker->randomElement($posts),
                'user_id' => $faker->randomElement($users)
            ]);
        }
    }
}
