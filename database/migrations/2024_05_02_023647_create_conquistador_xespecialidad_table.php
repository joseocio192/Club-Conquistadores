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
        Schema::create('Conquistador_xespecialidad', function (Blueprint $table) {
            $table->foreignId('conquistador_id')->references('id')->on('Conquistador');
            $table->foreignId('especialidad_id')->references('id')->on('Especialidad');
            $table->date('fechaCumplido');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ConquistadorXespecialidad');
    }
};
