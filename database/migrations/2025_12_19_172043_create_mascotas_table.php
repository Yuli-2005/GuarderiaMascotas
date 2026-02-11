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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_mascota', 30);
            $table->string('tipo_animal', 20);
            $table->string('nombre_propietario', 50); 
            $table->string('telefono', 15);           
            $table->date('fecha_salida')->nullable();
            $table->text('instrucciones_especiales')->nullable();
            $table->enum('estado', ['hospedado', 'recogido'])->default('hospedado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};