<?php

namespace App\Models\Traits\Mutators;

use App\Traits\Translations;

trait ClubMutator
{
    use Translations;

    public function getNombreAttribute($value)
    {
        return $this->Translation('nombre', $value);
    }

    public function getLemaAttribute($value)
    {
        return $this->Translation('lema', $value);
    }
}
