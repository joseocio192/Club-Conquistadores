<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DirectivoSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $directivo;

    /**
     * Create a new event instance.
     */
    public function __construct($directivo)
    {
        $this->directivo = $directivo;
    }
}
