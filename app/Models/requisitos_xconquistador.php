<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requisitos_xconquistador extends Model
{
    use HasFactory;
    protected $table='Requisitos_xconquistador';
    protected $fillable= [
        'requisito_id',
        'conquistador_id',
        'completado'
    ];
}
