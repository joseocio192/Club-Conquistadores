<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Asistencia extends Model
{
    use HasFactory;

    protected $table = 'Asistencia';

    protected $fillable = [
        'id_clase',
        'fecha',
    ];

    public function clase(): BelongsTo
    {
        return $this->belongsTo(Clase::class, 'id_clase')->withPivot('asistio', 'pulcritud');
    }

    public function conquistadores(): BelongsToMany
    {
        return $this->belongsToMany(Conquistador::class, 'Asistenciaxconquistador', 'id_asistencia', 'id_conquistador')->withPivot('asistio', 'pulcritud');
    }

}
