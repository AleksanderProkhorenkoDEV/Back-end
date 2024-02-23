<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Schema from the table Books
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id('book_id'); //ID, PRIMARY KEY, AUTO INCREMENTAL
            $table->string('title', 100); //String, max length 100, not null
            $table->string('category',30); //String, max length 30, not null
            $table->foreignId('author_id')->constrained('authors', 'author_id'); //FOREING KEY, Relates the authors table to the author_id field
            $table->string('description',100); //String, max length 100, not null
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
