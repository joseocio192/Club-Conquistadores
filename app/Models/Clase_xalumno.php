<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase_xalumno extends Model
{
    use HasFactory;
    protected $table='Clase_xalumno';
    protected $fillable= [
        'clase_id',
        'conquistador'
    ];
}
