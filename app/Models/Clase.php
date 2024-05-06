<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Clase extends Model
{
    use HasFactory;
    protected $table='Clase';
    protected $fillable=[
        'club_id',
        'instructor',
        'nombre',
        'color',
        'logo',
        'horario',
    ];

    public function alumnos(): BelongsToMany
    {
        return $this->belongsToMany(Conquistador::class, 'Clase_xalumno', 'clase_id', 'conquistador');
    }
}
