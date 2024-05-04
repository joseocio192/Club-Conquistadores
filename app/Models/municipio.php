<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class municipio extends Model
{
    use HasFactory;
    protected $table = 'Municipios';
    protected $fillable = [
        'nombre',
        'estado_id'
    ];
}
