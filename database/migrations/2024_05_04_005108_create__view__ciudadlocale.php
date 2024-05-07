<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //only run on production
        DB::statement("create or replace view vw_ciudadLocale as
            SELECT c.nombre,
            p.locale
            FROM Ciudad c
            INNER JOIN Municipios m ON m.id = c.municipio_id
            INNER JOIN Estados e ON e.id = m.Estado_id
            INNER JOIN Pais p ON p.id = e.pais_id; ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW vw_ciudadLocale;');
    }
};
