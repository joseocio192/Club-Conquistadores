<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tareaxconquistador extends Model
{
    use HasFactory;
    protected $table='Tareaxconquistador';
    protected $fillable=[
        'tarea_id',
        'conquistador',
        'completada'
    ];
}
