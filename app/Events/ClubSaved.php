<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClubSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $club;

    /**
     * Create a new event instance.
     */
    public function __construct($club)
    {
        $this->club = $club;
    }
}
