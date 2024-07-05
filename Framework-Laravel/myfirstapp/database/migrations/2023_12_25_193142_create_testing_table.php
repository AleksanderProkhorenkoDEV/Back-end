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
        Schema::create('testing', function (Blueprint $table) {
            //Primary Key
            $table->id(); 
            //Nos crea dos campos para que podamos guardar siempre la informacion de cuando se creo el registro y se modifico
            $table->timestamps(); 
            //Nuestros cambios propios
            //nullable() nos permite hacer un campo que no sea obligatorio, en este caso no necesita tener una longitud de 50 caracteres obligatoriamente
            $table->string('nombre',50)->nullable(); //Nombre del campo y la cantidad MAX de caracteres
            //Le agregamos un valor por defecto al booleano
            $table->boolean('mayoriaEdad')->default(true);
            $table->unsignedInteger('cantidadHermanos'); //Creamos un int siempre positivo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testing');
    }
};
