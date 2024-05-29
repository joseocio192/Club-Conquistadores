<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Log;
use App\Models\Clase;

use App\Events\ConquistadorSaved;
use App\Models\Traits\Mutators\ConquistadorMutator;


class Conquistador extends Model
{
    use HasFactory,
        ConquistadorMutator;

    protected $table = 'Conquistador';
    protected $fillable = [
        'user_id',
        'tutorLegal_id',
        'rol',
    ];

    protected $dispatchesEvents = [
        'saved' => ConquistadorSaved::class
    ];

    public function getEdadAttribute(): int
    {
        return $this->user->fecha_nacimiento ? now()->diffInYears($this->user->fecha_nacimiento) : 0;
    }

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

    public function especialidad(): BelongsToMany
    {
        return $this->belongsToMany(Especialidad::class, 'Conquistador_xespecialidad', 'conquistador_id', 'especialidad_id')->withPivot('fechaCumplido');
    }

    public function tareas(): BelongsToMany
    {
        return $this->belongsToMany(Tarea::class, 'Tareaxconquistador', 'conquistador', 'tarea_id')->withPivot('completada');
    }

    public function requisitos(): BelongsToMany
    {
        return $this->belongsToMany(Requisitos::class, 'Requisitos_xconquistador', 'conquistador_id', 'requisito_id')->withPivot('completado');
    }

    public function asistencia(): BelongsToMany
    {
        return $this->belongsToMany(Asistencia::class, 'Asistenciaxconquistador', 'id_conquistador', 'id_asistencia')->withPivot('asistio', 'pulcritud');
    }
}
