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
            $table->foreignID('Especialidad_ID')->references('id')->on('especialidad');
            $table->foreignId('Director_ID')->references('id')->on('directivo');
            $table->foreignId('ciudad')->references('id')->on('ciudad');
            $table->string('direccion', 150)->nullable();
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
