<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateYourView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("create view vw_ciudadLocale as
        SELECT
            c.nombre,
            p.locale
        FROM
            ciudad c
        INNER JOIN municipios m ON
            m.id = c.municipio_id
        INNER JOIN estados e ON
            e.id = m.Estado_id
        INNER JOIN pais p ON
            p.id = e.pais_id;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW view_name");
    }
}
