<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Instructor extends Model
{
    use HasFactory;
    protected $table= 'Instructor';
    protected $fillable= [
        'user_id',
        'jefe_id',
        'activo'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jefe(): BelongsTo
    {
        return $this->belongsTo(Directivo::class, 'jefe_id');
    }

    public function clases(): HasMany
    {
        return $this->hasMany(Clase::class, 'instructor');
    }

    public function unidad(): HasMany
    {
        return $this->hasMany(Unidad::class, 'instructor_id');
    }
}
