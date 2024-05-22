<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'Users';
    protected $fillable = [
        'name',
        'apellido',
        'email',
        'password',
        'telefono',
        'fecha_nacimiento',
        'calle',
        'numero_exterior',
        'numero_interior',
        'colonia',
        'ciudad_id',
        'codigo_postal',
        'sexo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getEdadAttribute(): int
    {
        return date_diff(date_create($this->fecha_nacimiento), date_create('now'))->y;
    }

    public function conquistador(): HasOne
    {
        return $this->hasOne(Conquistador::class, 'user_id');
    }

    public function instructor(): HasOne
    {
        return $this->hasOne(Instructor::class, 'user_id');
    }

    public function pupilo(): HasMany
    {
        return $this->hasMany(Conquistador::class, 'tutorLegal_id');
    }

    public function directivo(): HasOne
    {
        return $this->hasOne(Directivo::class, 'user_id');
    }

    public function ciudad(): BelongsTo
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id');
    }

    public function clases(): BelongsToMany
    {
        return $this->belongsToMany(Clase::class, 'Clase_xalumno', 'conquistador', 'clase_id');
    }

    public function unidades(): HasOne
    {
        return $this->hasOne(Unidad::class, 'conquistador_id');
    }

    public function club(): BelongsToMany
    {
        return $this->belongsToMany(Clubs::class, 'ClubXpersona', 'user_id', 'club_id')->using(ClubXpersona::class);
    }
}
