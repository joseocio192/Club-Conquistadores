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
        Schema::create('Asistenciaxconquistador', function (Blueprint $table) {
            $table->foreignId('id_asistencia')->references('id')->on('Asistencia');
            $table->foreignId('id_conquistador')->references('id')->on('Conquistador');
            $table->boolean('asistio');
            $table->string('pulcritud');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistenciaxconquistador');
    }
};
