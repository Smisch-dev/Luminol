<?php

namespace Luminol\Events\Server;

use Luminol\Events\Event;
use Luminol\Models\Server;
use Illuminate\Queue\SerializesModels;

class Updated extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public Server $server)
    {
    }
}
