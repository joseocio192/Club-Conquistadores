<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directivo extends Model
{
    use HasFactory;
    protected $table ='Directivo';
    protected $fillable= [
        'jefe_id',
        'ciudad_id',
        'user_id',
        'rol',
        'activo'
    ];
}
