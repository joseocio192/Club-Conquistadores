<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Unidad extends Model
{
    use HasFactory;
    protected $table= 'Unidad';
    protected $fillable= [
        'consejero_id',
        'capitan',
        'nombre',
        'logo',
        'lema',
        'sexo'
    ];

    public function consejero(): BelongsTo
    {
        return $this->belongsTo(Instructor::class, 'consejero_id');
    }

    public function capitan(): BelongsTo
    {
        return $this->belongsTo(Conquistador::class, 'capitan');
    }
}
