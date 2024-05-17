<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Tareaxconquistador extends Pivot
{
    use HasFactory;
    protected $table='Tareaxconquistador';
    protected $fillable=[
        'tarea_id',
        'conquistador',
        'completada'
    ];
}
