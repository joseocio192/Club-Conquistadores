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
        Schema::create('Tarea', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clase_id')->references('id')->on('Clase');
            $table->string('nombre', 150);
            $table->Text('descripcion');
            $table->date('fecha');
            $table->timestamps();
            $table->string('locale', 5)->default('es');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Tarea');
    }
};
