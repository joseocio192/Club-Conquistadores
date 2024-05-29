<?php

namespace App\Models\Traits\Mutators;

use App\Traits\Translations;

trait RequisitosMutator
{
    use Translations;

    public function getNombreAttribute($value)
    {
        return $this->Translation('nombre', $value);
    }

    public function getDescripcionAttribute($value)
    {
        return $this->Translation('descripcion', $value);
    }
}
