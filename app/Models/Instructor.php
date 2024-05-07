<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Instructor extends Model
{
    use HasFactory;
    protected $table= 'Instructor';
    protected $fillable= [
        'persona_id',
        'jefe_id',
        'activo'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'persona_id');
    }

    public function jefe(): BelongsTo
    {
        return $this->belongsTo(Directivo::class, 'jefe_id');
    }

    public function clases(): HasMany
    {
        return $this->hasMany(Clase::class, 'instructor_id');
    }

    public function unidad(): HasMany
    {
        return $this->hasMany(Unidad::class, 'instructor_id');
    }
}
