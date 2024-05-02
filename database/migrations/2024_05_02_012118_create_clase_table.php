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
        Schema::create('clase', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('color');
            $table->binary('logo');
            $table->string('horario');
            $table->integer('Max alumnos');
            $table->foreignId('ImpartidaPor')->references('id')->on('instructor');
            $table->integer('edadMinima');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clase');
    }
};
