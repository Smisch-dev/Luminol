<?php

namespace Luminol\Http\Requests\Api\Application\Servers\Databases;

use Luminol\Services\Acl\Api\AdminAcl;

class ServerDatabaseWriteRequest extends GetServerDatabasesRequest
{
    protected int $permission = AdminAcl::WRITE;
}
