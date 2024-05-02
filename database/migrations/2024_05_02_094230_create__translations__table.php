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
        Schema::create('_translations_', function (Blueprint $table) {
            $table->id();
            $table->String('Table');
            $table->String('column');
            $table->integer('Row_ID');
            $table->String('locale', 7);
            $table->Text('Content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_translations_');
    }
};
