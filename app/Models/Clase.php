<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
