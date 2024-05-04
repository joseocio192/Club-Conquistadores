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
        Schema::create('Persona', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('email', 45)->unique();
            $table->string('password', 100);
            $table->date('fecha_nacimiento');
            $table->string('telefono', 10)->nullable();
            $table->string('calle');
            $table->string('numero_exterior', 10);
            $table->string('numero_interior', 10)->nullable();
            $table->string('colonia', 100);
            $table->foreignId('ciudad_id')->references('id')->on('Ciudad');
            $table->string('codigo postal', 7);
            $table->string('sexo', 25);
            $table->boolean('vigente');
            $table->timestamps();
            $table->string('locale', 5);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Persona');
    }
};
