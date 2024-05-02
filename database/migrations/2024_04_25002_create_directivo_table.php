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
            $table->string('nombre');
            $table->string('apellido paterno');
            $table->string('apellido materno');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('rol', ['Director', 'Subdirector', 'Tesorero', 'Secretario', 'Consejero', 'Asesor', 'Consejero Mayor']);
            $table->string('sexo');
            //$table->foreignId('club_id')->references('id')->on('club');
            $table->foreignId('jefe')->references('id')->on('directivo');
            $table->string('telefono')->unique();
            $table->string('direccion');
            $table->foreignID('Municipcio_Id')->references('id')->on('municipios');
            $table->timestamps();
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
