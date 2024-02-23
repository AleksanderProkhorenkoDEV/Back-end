<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Schema from the table authors
     */
    public function up(): void
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id('author_id'); //ID, PRIMARY KEY, AUTO INCREMENTAL
            $table->string('surnames', 50); //String, max 50, not null
            $table->string('name', 30); //String, max 30, not null
            $table->string('nationality', 30); //String, max 30, not null
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};
