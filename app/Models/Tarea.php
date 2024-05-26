<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Events\TareaSaved;
use App\Models\Traits\Mutators\TareaMutator;

class Tarea extends Model
{
    use HasFactory,
        TareaMutator;

    protected $table = 'Tarea';
    protected $fillable = [
        'clase_id',
        'nombre',
        'descripcion',
        'fecha',
        'locale',
    ];

    protected $dispatchesEvents = [
        'saved' => TareaSaved::class
    ];

    public function clase(): BelongsTo
    {
        return $this->belongsTo(Clase::class, 'clase_id')->withPivot('completada');
    }

    public function conquistadores(): BelongsToMany
    {
        return $this->belongsToMany(Conquistador::class, 'tareaxconquistador', 'tarea_id', 'conquistador')->withPivot('completada');
    }
}
