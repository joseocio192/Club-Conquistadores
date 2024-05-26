<?php

namespace App\Models\Traits\Mutators;

use App\Traits\Translations;

trait EspecialidadMutator
{
    use Translations;

    public function getNombreAttribute($value)
    {
        return $this->Translation('nombre', $value);
    }
}
