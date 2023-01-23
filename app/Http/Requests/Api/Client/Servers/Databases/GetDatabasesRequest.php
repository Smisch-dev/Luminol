<?php

namespace Luminol\Http\Requests\Api\Client\Servers\Databases;

use Luminol\Models\Permission;
use Luminol\Contracts\Http\ClientPermissionsRequest;
use Luminol\Http\Requests\Api\Client\ClientApiRequest;

class GetDatabasesRequest extends ClientApiRequest implements ClientPermissionsRequest
{
    public function permission(): string
    {
        return Permission::ACTION_DATABASE_READ;
    }
}
