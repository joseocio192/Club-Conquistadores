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
        Schema::create('Clase_xespecialidad', function (Blueprint $table) {
            $table->foreignId('clase_id')->constrained('Clase');
            $table->foreignId('especialidad_id')->constrained('Especialidad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clase_xespecialidad');
    }
};
