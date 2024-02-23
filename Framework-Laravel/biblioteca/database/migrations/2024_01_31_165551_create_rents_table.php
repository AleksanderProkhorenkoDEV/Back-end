<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Schema from the rents table.
     */
    public function up(): void
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id('rent_id'); //ID, PRIMARY KEY, AUTO INCREMENTAL
            $table->foreignId('book_id')->constrained('books', 'book_id'); //FOREING KEY, Relates the books table to the book_id field
            $table->foreignId('user_id')->constrained('users', 'user_id'); //FOREING KEY, Relates the users table to the user_id field
            $table->date('loan_date'); //Date, NOT NULL
            $table->date('deadline')->nullable();//DATE, NULL
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
