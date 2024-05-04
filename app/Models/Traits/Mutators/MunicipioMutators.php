<?php

namespace App\Models\Traits\Mutators;

use App\Traits\Translations;

trait MunicipioMutators
{
    use Translations;

    public function getNombreAttribute($value)
    {
        return $this->Translations('nombre', $value);
    }
}
