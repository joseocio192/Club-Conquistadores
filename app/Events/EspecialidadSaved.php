<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EspecialidadSaved
{
    use Dispatchable, SerializesModels;

    public $especialidad;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($especialidad)
    {
        $this->especialidad = $especialidad;
    }
}
