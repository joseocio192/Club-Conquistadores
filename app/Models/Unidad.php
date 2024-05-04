<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;
    protected $table= 'Unidad';
    protected $fillable= [
        'consejero_id',
        'capitan',
        'nombre',
        'logo',
        'sexo',
        'lema'
    ];
}
