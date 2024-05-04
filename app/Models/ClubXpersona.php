<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubXpersona extends Model
{
    use HasFactory;
    protected $table='ClubXpersona';
    protected $fillable= [
        'club_id',
        'persona_id',
        'fechaIngreso',
        'fechRetiro',
        'activo',
        'detalles'
    ];
}
