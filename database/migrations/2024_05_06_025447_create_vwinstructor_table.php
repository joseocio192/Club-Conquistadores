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
        DB::statement('create or replace view vw_instructor as
        SELECT
        i.id as id, i.user_id as uid, i.jefe_id as jefeid, i.activo as activo, i.created_at, i.updated_at, u.name as nombre, u.apellido as apellido, u.email as email, u.password as contraseña, u.telefono as telefono, u.fecha_nacimiento as fecha_nacimiento, u.calle as calle, u.numero_exterior as numero_exterior, u.numero_interior as numero_interior, u.colonia as colonia, u.ciudad_id as ciudad_id, c.nombre as ciudad,m.id as municipio_id, m.nombre as municipio, e.id as estado_id, e.nombre as estado, p.id as pais_id, p.nombre as pais
        from instructor i
        INNER join users u on u.id = i.user_id
        INNER JOIN ciudad c on c.id = u.ciudad_id
        INNER JOIN municipios m on m.id = c.municipio_id
        INNER JOIN estados e on e.id = m.estado_id
        INNER JOIN pais p on p.id = e.pais_id');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DROP VIEW IF EXISTS vwinstructor');
    }
};
