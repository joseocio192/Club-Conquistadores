<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Log;
use App\Events\EspecialidadSaved;
use App\Models\Traits\Mutators\EspecialidadMutator;

class Especialidad extends Model
{
    use HasFactory,
        EspecialidadMutator;

    protected $table = 'Especialidad';
    protected $fillable = [
        'nombre',
        'locale'
    ];

    protected $dispatchesEvents = [
        'saved' => EspecialidadSaved::class
    ];

    public function requisitos(): HasMany
    {
        return $this->hasMany(Requisitos::class, 'especialidad_id');
    }

    public function conquistadores(): BelongsToMany
    {
        return $this->belongsToMany(Conquistador::class, 'Conquistador_xespecialidad', 'especialidad_id', 'conquistador_id');
    }
}
