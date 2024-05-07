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
        Schema::create('Users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apellido', 100);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telefono', 10)->nullable();
            $table->date('fecha_nacimiento');
            $table->string('calle');
            $table->string('numero_exterior', 10);
            $table->string('numero_interior', 10)->nullable();
            $table->string('colonia', 100);
            $table->foreignId('ciudad_id')->references('id')->on('Ciudad');
            $table->string('codigo_postal', 7);
            $table->enum('sexo', ['Hombre', 'Mujer', 'Otro']);
            $table->enum('rol', ['admin', 'conquistador','tutor','directivo','instructor'])->default('conquistador');
            $table->boolean('vigente')->default(1);
            $table->timestamps();
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('locale', 5)->default('es')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Users');
    }
};
