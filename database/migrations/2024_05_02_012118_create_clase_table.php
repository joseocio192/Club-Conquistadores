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
        Schema::create('clase', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')->references('id')->on('club');
            $table->foreignId('impartidaPor')->references('id')->on('instructor');
            $table->string('nombre');
            $table->string('color');
            $table->string('logo');
            $table->string('horario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clase');
    }
};
