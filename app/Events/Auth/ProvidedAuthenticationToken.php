<?php

namespace Luminol\Events\Auth;

use Luminol\Models\User;
use Luminol\Events\Event;

class ProvidedAuthenticationToken extends Event
{
    public function __construct(public User $user, public bool $recovery = false)
    {
    }
}
