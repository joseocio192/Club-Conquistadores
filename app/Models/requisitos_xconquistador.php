<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
USE Illuminate\Database\Eloquent\Relations\Pivot;

class requisitos_xconquistador extends Pivot
{
    use HasFactory;
    protected $table='Requisitos_xconquistador';
    protected $fillable= [
        'requisito_id',
        'conquistador_id',
        'completado'
    ];
}
