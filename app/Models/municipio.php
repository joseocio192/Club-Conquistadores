<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Mutators\MunicipioMutators;

class Municipio extends Model
{
    use HasFactory,
        MunicipioMutators;

    protected $fillable = ['nombre', 'estado_id', 'locale'];
}
