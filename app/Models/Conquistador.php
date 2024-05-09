<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Clase;


class Conquistador extends Model
{
    use HasFactory;
    protected $table='Conquistador';
    protected $fillable=[
        'user_id',
        'tutorLegal_id',
        'rol'
    ];

    public function clases(): BelongsToMany
    {
        return $this->belongsToMany(Clase::class, 'Clase_xalumno', 'conquistador', 'clase_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tutorLegal(): BelongsTo
    {
        return $this->belongsTo(User::class, 'tutorLegal_id');
    }

    public function unidad(): HasOne
    {
        return $this->hasOne(Unidad::class, 'conquistador_id');
    }

    public function capitan(): BelongsTo
    {
        return $this->belongsTo(unidad::class, 'capitan_id');
    }

    public function especialidad(): hasMany
    {
        return $this->hasMany(Especialidad::class, 'conquistador_x_especialidad', 'conquistador_id', 'especialidad_id')->using(Conquistador_xespecialidad::class);
    }

    public function tareas(): BelongsToMany
    {
        return $this->belongsToMany(Tarea::class, 'tareaxconquistador', 'conquistador', 'tarea_id');
    }

    public function requisitos(): hasMany
    {
        return $this->hasMany(Requisitos::class, 'conquistador_id')->using(Requisitos_xconquistador::class);
    }
}
