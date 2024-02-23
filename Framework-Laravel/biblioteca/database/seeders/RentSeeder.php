<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rent;
use App\Models\Book;
use App\Models\User;

class RentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $book1 = Book::inRandomOrder()->first();
        $user1 = User::where('email', 'usuario@example.com')->first();

        Rent::create([
            'book_id' => $book1->book_id,
            'user_id' => $user1->user_id,
            'loan_date' => now(),
            'deadline' => now()->addDays(14),
        ]);

        $book2 = Book::inRandomOrder()->first();
        $user2 = User::where('email', 'usuario2@gmail.com')->first();

        Rent::create([
            'book_id' => $book2->book_id,
            'user_id' => $user2->user_id,
            'loan_date' => now(),
            'deadline' => now()->addDays(14),
        ]);

        $book3 = Book::inRandomOrder()->first();
        $user3 = User::where('email', 'usuario3@hotmail.com')->first();

        Rent::create([
            'book_id' => $book3->book_id,
            'user_id' => $user3->user_id,
            'loan_date' => now(),
            'deadline' => now()->addDays(14),
        ]);

        $book4 = Book::inRandomOrder()->first();
        $user4 = User::where('email', 'usuario4@geducan.com')->first();

        Rent::create([
            'book_id' => $book4->book_id,
            'user_id' => $user4->user_id,
            'loan_date' => now(),
            'deadline' => now()->addDays(14),
        ]);
    }
}
