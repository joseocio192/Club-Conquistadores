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
        Schema::create('Clase_xalumno', function (Blueprint $table) {
            $table->foreignId('clase_id')->references('id')->on('Clase');
            $table->foreignId('conquistador')->references('id')->on('Conquistador');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Clase_xalumno');
    }
};
