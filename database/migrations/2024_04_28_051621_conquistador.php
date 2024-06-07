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
        //
        Schema::create('Conquistador', function (Blueprint $table) {
            $table->id();
            $table->foreignID('user_id')->references('id')->on('Users');
            $table->foreignId('tutorLegal_id')->nullable()->constrained('Users');
            $table->string('locale')->default('es');
            $table->string('rol', 35);
            //$table->foreignId('unidad_id')->references('id')->on('Unidad');
            $table->rememberToken();
            $table->boolean('aceptado')->default(false);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Conquistador');
    }
};
