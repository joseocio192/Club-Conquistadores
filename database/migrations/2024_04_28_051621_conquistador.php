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
        //
        Schema::create('Conquistador', function (Blueprint $table) {
            $table->id();
            $table->foreignID('user_id')->references('id')->on('Users');
            $table->foreignID('tutorLegal_id')->references('id')->on('Users');
            //Esto no puede ser una restriccion estatica Esto debe ser una restriccion dinamica por el idioma
            $table->enum('rol', ['Amigo', 'Compañero', 'Explorador', 'Orientador', 'viajero', 'Guia', 'Guia Mayor Aspirante', 'Guia Mayor Investido']);
            //$table->foreignId('unidad_id')->references('id')->on('Unidad');
            $table->rememberToken();
            $table->boolean('aceptado')->default(false);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Conquistador');
    }
};
