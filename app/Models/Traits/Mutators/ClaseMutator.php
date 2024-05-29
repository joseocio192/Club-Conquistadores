<?php

namespace App\Models\Traits\Mutators;

use App\Traits\Translations;

trait ClaseMutator
{
    use Translations;

    public function getNombreAttribute($value)
    {
        return $this->Translation('nombre', $value);
    }

    public function getColorAttribute($value)
    {
        return $this->Translation('color', $value);
    }
}
