<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Conquistador_xespecialidad extends Pivot
{
    use HasFactory;
    protected $table = 'Conquistador_xespecialidad';
    protected $fillable = [
        'conquistador_id',
        'especialidad_id',
        'fechaCumplido',
    ];

    public function conquistador()
    {
        return $this->belongsTo(Conquistador::class, 'conquistador_id');
    }

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'especialidad_id');
    }
}
