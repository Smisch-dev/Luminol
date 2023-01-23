<?php

namespace Luminol\Contracts\Core;

use Luminol\Events\Event;

interface ReceivesEvents
{
    /**
     * Handles receiving an event from the application.
     */
    public function handle(Event $notification): void;
}
