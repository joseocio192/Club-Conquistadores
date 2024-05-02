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
        Schema::create('directivo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jefe_id')->references('id')->on('directivo');
            $table->foreignID('ciudad_id')->references('id')->on('ciudad');
            $table->foreignId('persona_id')->references('id')->on('Persona');
            //Esto no puede ser una restriccion estatica Esto debe ser una restriccion dinamica por el idioma
            $table->enum('rol', ['Director', 'Subdirector', 'Tesorero', 'Secretario', 'Asesor']);
            $table->timestamps();
            $table->string('locale', 5);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directivo');
    }
};
