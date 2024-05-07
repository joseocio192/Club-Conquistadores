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
        Schema::create('ClubXpersona', function (Blueprint $table) {
            $table->foreignId('club_id')->references('id')->on('Clubs');
            $table->foreignId('user_id')->references('id')->on('Users');
            $table->timestamp('fechaIngreso')->useCurrent();
            $table->date('fechaRetiro')->nullable();
            $table->boolean('activo')->default(true);
            $table->string('detalles')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Club_xconquistador');
    }
};
