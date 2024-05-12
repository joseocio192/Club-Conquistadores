<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Clubs;
use App\Models\Instructor;

class Clase extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'Clase';
    protected $fillable = [
        'club_id',
        'instructor',
        'nombre',
        'color',
        'logo',
        'horario',
        'edadMinima',
        'locale',
    ];

    public function club(): BelongsTo
    {
        return $this->belongsTo(Clubs::class, 'club_id');
    }

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class, 'instructor');
    }

    public function conquistadores(): BelongsToMany
    {
        return $this->belongsToMany(Conquistador::class, 'Clase_xalumno', 'clase_id', 'conquistador');
    }

    public function tareas() : BelongsToMany
    {
        return $this->belongsToMany(Tarea::class)->withPivot('completada');
    }

    public function asistencia() : BelongsToMany
    {
        return $this->belongsToMany(Asistencia::class, 'id_clase')->withPivot('asistio', 'pulcritud');
    }
}
