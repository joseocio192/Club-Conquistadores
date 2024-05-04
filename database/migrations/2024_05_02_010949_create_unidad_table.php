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
        Schema::create('Unidad', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consejero_id')->references('id')->on('Instructor');
            $table->foreignId('capitan')->references('id')->on('Conquistador');
            $table->string('nombre', 100);
            $table->string('logo', 50);
            $table->text('lema');
            $table->string('sexo', 25);
            $table->timestamps();
            $table->string('locale', 5);
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Unidad');
    }
};
