<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conquistador extends Model
{
    use HasFactory;
    protected $table='Conquistador';
    protected $fillable=[
        'user_id',
        'tutorLegal_id',
        'rol'
    ];
}
