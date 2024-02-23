<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Schema from the table Users
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id'); //ID, PRIMARY KEY, AUTO INCREMENTAL
            $table->string('name',30); //String, max 30, not null
            $table->string('email')->unique(); //String, unique in data base, not null
            $table->string('phone', 10)->nullable(); //String, max 10, null
            $table->date('deadline')->nullable();//date, null
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); //String, not null
            $table->rememberToken(); //Toker, when the user login
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
