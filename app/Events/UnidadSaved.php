<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UnidadSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $unidad;

    /**
     * Create a new event instance.
     */
    public function __construct($unidad)
    {
        $this->unidad = $unidad;
    }
}
