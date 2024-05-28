<?php

namespace App\Models\Traits\Mutators;

use App\Traits\Translations;

trait RequisitosMutator
{
    use Translations;

    public function getNombreAttribute($value)
    {
        return $this->getTranslation('nombre', $value);
    }

    public function getDescripcionAttribute($value)
    {
        return $this->getTranslation('descripcion', $value);
    }
}
