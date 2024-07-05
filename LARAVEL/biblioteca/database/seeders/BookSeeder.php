<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authorIds = Author::pluck('author_id');

        for ($i = 1; $i <= 5; $i++) {
            Book::create([
                'title' => "Título{$i}",
                'category' => "Categoría{$i}",
                'author_id' => $authorIds->random(),
                'description' => "Descripción{$i}",
            ]);
        }
    }
}
