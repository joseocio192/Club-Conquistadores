<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clasex_especialidad extends Model
{
    use HasFactory;
    protected $table = 'Clase_xespecialidad';
    //no timestamps
    public $timestamps = false;
    protected $fillable = [
        'clase_id',
        'especialidad_id'
    ];
}
