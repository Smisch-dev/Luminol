<?php

namespace Luminol\Http\Requests\Api\Application\Servers;

use Luminol\Services\Acl\Api\AdminAcl;
use Luminol\Http\Requests\Api\Application\ApplicationApiRequest;

class GetExternalServerRequest extends ApplicationApiRequest
{
    protected ?string $resource = AdminAcl::RESOURCE_SERVERS;

    protected int $permission = AdminAcl::READ;
}
