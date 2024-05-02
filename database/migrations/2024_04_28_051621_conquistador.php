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
            $table->string('nombre');
            $table->string('apellido paterno');
            $table->string('apellido materno');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('rol',['Amigo','Compañero','Explorador','Orientador','viajero','Guia','Guia Mayor']);
            $table->string('telefono');
            $table->string('direccion');
            $table->string('codigo postal');
            $table->foreignID('Estado_id')->references('id')->on('estados');
            $table->foreignID('Pais_id')->references('id')->on('Pais');
            $table->foreignID('TutorLegal_id')->references('id')->on('tutorlegal');
            $table->foreignID('Clubs_id')->references('id')->on('Club');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
