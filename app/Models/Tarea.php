<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;
    protected $table='Tarea';
    protected $fillable=[
        'clase_id',
        'nombre',
        'descripcion',
        'fecha',
];
}
