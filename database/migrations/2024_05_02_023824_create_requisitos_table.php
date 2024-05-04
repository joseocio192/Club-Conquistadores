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
        Schema::create('Requisitos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('especialidad_id')->references('id')->on('Especialidad');
            $table->string('nombre', 100);
            $table->Text('descripcion');
            $table->timestamps();
            $table->string('locale', 5);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Requisitos');
    }
};
