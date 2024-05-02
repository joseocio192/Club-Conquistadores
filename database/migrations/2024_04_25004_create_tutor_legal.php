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
        Schema::create('tutorlegal', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido paterno');
            $table->string('apellido materno');
            $table->string('curp');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutorlegal');
    }
};
