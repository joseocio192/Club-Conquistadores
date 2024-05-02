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
        Schema::create('requisitos_xconsquitador', function (Blueprint $table) {
            $table->foreignId('requisito_id')->references('id')->on('requisitos');
            $table->foreignId('conquistador_id')->references('id')->on('conquistador');
            $table->boolean('completado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisitos_xconsquitador');
    }
};
