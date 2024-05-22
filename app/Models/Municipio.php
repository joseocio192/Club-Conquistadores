<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Mutators\MunicipioMutators;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Municipio extends Model
{
    use HasFactory,
        MunicipioMutators;
    protected $table = 'Municipios';

    protected $fillable = ['nombre', 'estado_id'];

    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estados::class, 'estado_id', 'id');
    }

    public function ciudad(): HasMany
    {
        return $this->hasMany(Ciudad::class, 'municipio_id', 'id');
    }
}
