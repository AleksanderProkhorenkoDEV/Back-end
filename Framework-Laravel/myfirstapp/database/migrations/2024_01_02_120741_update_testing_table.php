<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Añadimos los nuevos registros
        Schema::table('testing', function(Blueprint $table){
            $table->string('pruebaUPDATEMIGRATION', 20);
        });

      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropColumn(['pruebaUPDATEMIGRATION']);
    }
};
