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
        Schema::create('clubXconquistador', function (Blueprint $table) {
            $table->foreignId('club_id')->references('id')->on('club');
            $table->foreignId('conquistador_id')->references('id')->on('conquistador');
            $table->date('fechaIngreso');
            $table->date('fechaRetiro')->nullable();
            $table->boolean('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('club_xconquistador');
    }
};
