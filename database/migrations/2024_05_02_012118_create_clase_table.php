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
        Schema::create('Clase', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')->references('id')->on('Clubs');
            $table->foreignId('instructor')->references('id')->on('Instructor');
            $table->string('nombre', 100);
            $table->string('color', 50);
            $table->string('logo', 50)->nullable();
            $table->string('horario', 50);
            $table->integer('edadMinima')->default(12);
            $table->string('locale', 5);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Clase');
    }
};
