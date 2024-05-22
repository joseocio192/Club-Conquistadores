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
        Schema::create('Directivo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('Users');
            //por alguna razon el jefe no puede ser nulo y tienes que meterte a la base de datos a cambiarlo
            $table->foreignId('jefe_id')->nullable()->references('id')->on('Directivo');
            $table->foreignId('ciudad_id')->nullable()->references('id')->on('Ciudad')->nullable();
            $table->foreignId('municipio_id')->nullable()->references('id')->on('Municipios')->nullable();
            $table->foreignId('estado_id')->nullable()->references('id')->on('Estados')->nullable();
            $table->foreignId('pais_id')->nullable()->references('id')->on('Pais')->nullable();
            //Esto no puede ser una restriccion estatica Esto debe ser una restriccion dinamica por el idioma
            $table->enum('rol', ['Director', 'Subdirector', 'Tesorero', 'Secretario', 'Asesor', 'Administrador', 'Master']);
            $table->boolean('activo')->default(true);
            $table->timestamps();
            $table->string('locale', 5);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Directivo');
    }
};
