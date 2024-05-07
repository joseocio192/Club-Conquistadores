<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ClubXpersona extends Pivot
{
    use HasFactory;
    protected $table='ClubXpersona';
    protected $fillable= [
        'club_id',
        'user_id',
        'fechaIngreso',
        'fechRetiro',
        'activo',
        'detalles'
    ];
}
