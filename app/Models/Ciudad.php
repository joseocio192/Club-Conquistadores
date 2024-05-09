<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ciudad extends Model
{
    use HasFactory;
    protected $table = 'Ciudad';
    protected $fillable = [
        'nombre',
        'municipio_id'
    ];

    public function municipio(): BelongsTo
    {
        return $this->belongsTo(Municipio::class, 'municipio_id', 'id');
    }

    public function clubs(): HasMany
    {
        return $this->hasMany(Clubs::class, 'ciudad_id', 'id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'ciudad_id', 'id');
    }

    public function directivos(): HasMany
    {
        return $this->hasMany(Directivo::class, 'ciudad_id', 'id');
    }
}
