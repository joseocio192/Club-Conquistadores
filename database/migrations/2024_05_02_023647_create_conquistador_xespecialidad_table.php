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
        Schema::create('conquistadorXespecialidad', function (Blueprint $table) {
            $table->foreignId('conquistador_id')->references('id')->on('conquistador');
            $table->foreignId('especialidad_id')->references('id')->on('especialidad');
            $table->date('fechaCumplido');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conquistadorXespecialidad');
    }
};
