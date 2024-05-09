<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Clubs;
use App\Models\Instructor;

class Clase extends Model
{
    use HasFactory;
    protected $table = 'Clase';
    protected $fillable = [
        'club_id',
        'instructor',
        'nombre',
        'color',
        'logo',
        'horario',
    ];

    public function club(): BelongsTo
    {
        return $this->belongsTo(Clubs::class, 'club_id');
    }

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructor::class, 'instructor');
    }

    public function alumnos(): BelongsToMany
    {
        return $this->belongsToMany(Conquistador::class, 'Clase_xalumno', 'clase_id', 'conquistador');
    }
}
