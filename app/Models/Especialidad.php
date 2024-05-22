<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Especialidad extends Model
{
    use HasFactory;
    protected $table = 'Especialidad';
    protected $fillable = [
        'nombre',
        'locale'
    ];

    public function requisitos(): HasMany
    {
        return $this->hasMany(Requisitos::class, 'especialidad_id');
    }

    public function conquistadores(): BelongsToMany
    {
        return $this->belongsToMany(Conquistador::class, 'Requisitos_xconquistador', 'requisito_id', 'conquistador')->using(Requisitos_xconquistador::class);
    }
}
