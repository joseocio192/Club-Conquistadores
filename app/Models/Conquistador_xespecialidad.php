<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conquistador_xespecialidad extends Model
{
    use HasFactory;
    protected $table='Conquistador_xespecialidad';
    protected $fillable= [
        'conquistador_id',
        'especialidad_id',
        'fechaCumoplido',
    ];
}
