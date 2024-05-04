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
        Schema::create('Requisitos_xconsquitador', function (Blueprint $table) {
            $table->foreignId('requisito_id')->references('id')->on('Requisitos');
            $table->foreignId('conquistador_id')->references('id')->on('Conquistador');
            $table->boolean('completado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Requisitos_xconsquitador');
    }
};
