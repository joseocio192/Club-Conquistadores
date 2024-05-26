<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ConquistadorSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $conquistador;

    /**
     * Create a new event instance.
     */
    public function __construct($conquistador)
    {
        $this->conquistador = $conquistador;
    }
}
