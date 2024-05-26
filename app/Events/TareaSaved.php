<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TareaSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $tarea;

    /**
     * Create a new event instance.
     */
    public function __construct($tarea)
    {
        $this->tarea = $tarea;
    }
}
