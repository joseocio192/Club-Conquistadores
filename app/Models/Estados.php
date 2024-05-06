<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estados extends Model
{
    use HasFactory;
    protected $table = 'Estados';
    protected $fillable = [
        'nombre'
        , 'id_pais'
    ];

    public function municipios(): HasMany
    {
        return $this->hasMany(Municipio::class, 'estado_id', 'id');
    }

    public function pais(): BelongsTo
    {
        return $this->belongsTo(Pais::class, 'id_pais', 'id');
    }
}
