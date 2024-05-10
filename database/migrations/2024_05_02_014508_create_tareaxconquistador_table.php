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
        Schema::create('Tareaxconquistador', function (Blueprint $table) {
            $table->foreignId('tarea_id')->references('id')->on('Tarea');
            $table->foreignId('conquistador')->references('id')->on('Conquistador');
            $table->boolean('completada')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Tareaxconquistador');
    }
};
