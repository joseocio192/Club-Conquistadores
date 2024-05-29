<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Events\RequisitosSaved;
use App\Models\Traits\Mutators\RequisitosMutator;

class Requisitos extends Model
{
    use HasFactory,
        RequisitosMutator;

    protected $table = 'Requisitos';
    protected $fillable = [
        'especialidad_id',
        'nombre',
        'descripcion'
    ];

    protected $dispatchesEvents = [
        'saved' => RequisitosSaved::class
    ];

    public function especialidad(): BelongsTo
    {
        return $this->belongsTo(Especialidad::class, 'especialidad_id');
    }

    public function conquistadores(): BelongsToMany
    {
        return $this->belongsToMany(Conquistador::class, 'requisitos_xconsquitador', 'requisito_id', 'conquistador_id')->withPivot('completado');
    }
}
