<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clubs extends Model
{
    use HasFactory;
    protected $table= 'Clubs';
    protected $filable= [
        'especialidad_Id',
        'director_Id',
        'ciudad',
        'calle',
        'numero_exterior',
        'numero_interior',
        'colonia',
        'nombre',
        'lema',
        'logo',
        'especialidad',

    ];
}
