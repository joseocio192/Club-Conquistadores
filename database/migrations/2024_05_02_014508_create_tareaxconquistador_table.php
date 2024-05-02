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
        Schema::create('tareaxconquistador', function (Blueprint $table) {
            $table->foreignId('tarea_id')->references('id')->on('tarea');
            $table->foreignId('conquistador')->references('id')->on('conquistador');
            $table->boolean('completada');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareaxconquistador');
    }
};
