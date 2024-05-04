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
        Schema::create('Club', function (Blueprint $table) {
            $table->id();
            $table->foreignID('especialidad_ID')->references('id')->on('Especialidad');
            $table->foreignId('director_ID')->references('id')->on('Directivo');
            $table->foreignId('ciudad')->references('id')->on('Ciudad');
            $table->string('calle');
            $table->string('numero exterior', 10);
            $table->string('numero interior', 10)->nullable();
            $table->string('colonia', 100);

            $table->string('nombre', 100);
            $table->text('lema')->nullable();
            $table->string('logo', 50)->nullable();
            $table->string('especialidad', 55)->nullable();
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
