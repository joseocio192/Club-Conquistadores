<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Events\RequisitosSaved;
use App\Models\Traits\Mutators\RequisitosMutator;

class requisitos extends Model
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

    public function requisitos(): BelongsToMany
    {
        return $this->belongsTo(Conquistador::class, 'Requisitos_xconquistador', 'requisito_id', 'conquistador')->using(Requisitos_xconquistador::class);
    }
}
