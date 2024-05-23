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
        Schema::create('Clubs', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->foreignId('especialidad_Id')->references('id')->on('Especialidad');
            $table->foreignId('director_Id')->references('id')->on('Users');
            $table->foreignId('ciudad_Id')->references('id')->on('Ciudad');
            $table->string('calle');
            $table->string('numero_exterior', 10);
            $table->string('numero_interior', 10)->nullable();
            $table->string('colonia', 100);
            $table->text('lema')->nullable();
            $table->string('logo', 50)->nullable();
            $table->timestamps();
            $table->string('locale', 5);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Club');
    }
};
