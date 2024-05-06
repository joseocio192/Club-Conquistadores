<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use PhpParser\Node\Scalar\MagicConst\Dir;

class Directivo extends Model
{
    use HasFactory;
    protected $table ='Directivo';
    protected $fillable= [
        'jefe_id',
        'ciudad_id',
        'municipio_id',
        'estado_id',
        'pais_id',
        'user_id',
        'rol',
        'activo'
    ];

    public function jefe(): BelongsTo
    {
        return $this->belongsTo(Directivo::class, 'jefe_id');
    }

    public function subordinados(): HasMany
    {
        return $this->hasMany(Directivo::class, 'jefe_id');
    }

    public function ciudad(): BelongsTo
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id');
    }

    public function municipio(): BelongsTo
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }

    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estados::class, 'estado_id');

    }

    public function pais(): BelongsTo
    {
        return $this->belongsTo(Pais::class, 'pais_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function club(): HasOne
    {
        return $this->hasOne(Clubs::class, 'director_Id');
    }

    public function instructor(): HasMany
    {
        return $this->hasMany(Instructor::class, 'jefe_id');
    }

}
