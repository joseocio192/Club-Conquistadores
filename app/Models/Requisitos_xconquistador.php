<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Requisitos_xconquistador extends Pivot
{
    use HasFactory;
    //table doesnt have timestamps
    public $timestamps = false;
    protected $table = 'Requisitos_xconquistador';
    protected $fillable = [
        'requisito_id',
        'conquistador_id',
        'completado'
    ];
}
