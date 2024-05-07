<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class requisitos extends Model
{
    use HasFactory;
    protected $table='Requisitos';
    protected $fillable=[
        'especialidad_id',
        'nombre',
        'descripcion'
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
