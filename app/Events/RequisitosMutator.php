<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RequisitosSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $requisitos;

    /**
     * Create a new event instance.
     */
    public function __construct($requisitos)
    {
        $this->requisitos = $requisitos;
    }
}
