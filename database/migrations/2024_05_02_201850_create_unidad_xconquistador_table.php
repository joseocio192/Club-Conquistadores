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
        Schema::create('unidad_xconquistador', function (Blueprint $table) {
            $table->foreignId('Conquistador_id')->references('id')->on('Conquistador');
            $table->foreignId('unidad_id')->references('id')->on('Unidad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidad_xconquistador');
    }
};
