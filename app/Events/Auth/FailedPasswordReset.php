<?php

namespace Luminol\Events\Auth;

use Luminol\Events\Event;
use Illuminate\Queue\SerializesModels;

class FailedPasswordReset extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public string $ip, public string $email)
    {
    }
}
