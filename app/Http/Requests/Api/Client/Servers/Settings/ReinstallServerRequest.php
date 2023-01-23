<?php

namespace Luminol\Http\Requests\Api\Client\Servers\Settings;

use Luminol\Models\Permission;
use Luminol\Http\Requests\Api\Client\ClientApiRequest;

class ReinstallServerRequest extends ClientApiRequest
{
    public function permission(): string
    {
        return Permission::ACTION_SETTINGS_REINSTALL;
    }
}
