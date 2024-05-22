<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Clubs extends Model
{
    use HasFactory;
    protected $table = 'Clubs';
    protected $filable = [
        'nombre',
        'especialidad_Id',
        'director_Id',
        'ciudad_Id',
        'calle',
        'numero_exterior',
        'numero_interior',
        'colonia',
        'lema',
        'logo',
        'especialidad',

    ];

    public function clase(): HasMany
    {
        return $this->hasMany(Clase::class, 'club_id');
    }

    public function especialidad(): BelongsTo
    {
        return $this->belongsTo(Especialidad::class, 'especialidad_Id');
    }

    public function director(): BelongsTo
    {
        return $this->belongsTo(Directivo::class, 'director_Id');
    }

    public function ciudad(): BelongsTo
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_Id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'ClubXpersona', 'club_id', 'user_id')->using(ClubXpersona::class);
    }
    public function instructores(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'ClubXpersona', 'club_id', 'user_id')->using(ClubXpersona::class)->where('rol', 'instructor');
    }

    public function conquistadores(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'ClubXpersona', 'club_id', 'user_id')->using(ClubXpersona::class)->where('rol', 'conquistador');
    }

    public function numbers(): HasMany
    {
        return $this->hasMany(ClubsNumbers::class, 'id_club');
    }
}
