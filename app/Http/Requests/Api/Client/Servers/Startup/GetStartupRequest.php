<?php

namespace Luminol\Http\Requests\Api\Client\Servers\Startup;

use Luminol\Models\Permission;
use Luminol\Http\Requests\Api\Client\ClientApiRequest;

class GetStartupRequest extends ClientApiRequest
{
    public function permission(): string
    {
        return Permission::ACTION_STARTUP_READ;
    }
}
