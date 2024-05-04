<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requisitos extends Model
{
    use HasFactory;
    protected $table='Requisitos';
    protected $fillable=[
        'especialidad_id',
        'nombre',
        'descripcion'
    ];
}
