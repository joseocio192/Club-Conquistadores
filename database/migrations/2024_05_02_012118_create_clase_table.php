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
            $table->foreignId('club_id')->references('id')->on('Club');
            $table->foreignId('instructor')->references('id')->on('instructor');
            $table->string('nombre', 100);
            $table->string('color', 50);
            $table->string('logo', 50);
            $table->string('horario', 50);
            $table->timestamps();
            $table->string('locale', 5);
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
