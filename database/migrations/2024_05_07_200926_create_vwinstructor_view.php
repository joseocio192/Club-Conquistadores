<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use illuminate\support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('create or replace view vw_instructor as
        SELECT *
        FROM instructor i
        inner join users u on u.id = i.user_id
        inner join jefe j on j.id = i.jefe_id
        inner join ciudad c on c.id = u.ciudad_inner
        inner join municipio m on m.id = c.municipio_id
        inner join estado on e.id = m.estado_id
        inner join pais p p.is = e.pais_id
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vw_instructor');
    }
};
