<?php

namespace Luminol\Http\Requests\Api\Client\Servers\Network;

use Luminol\Models\Permission;
use Luminol\Http\Requests\Api\Client\ClientApiRequest;

class NewAllocationRequest extends ClientApiRequest
{
    public function permission(): string
    {
        return Permission::ACTION_ALLOCATION_CREATE;
    }
}
