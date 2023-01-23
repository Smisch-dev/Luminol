<?php

namespace Luminol\Http\Requests\Api\Application\Nests\Eggs;

use Luminol\Services\Acl\Api\AdminAcl;
use Luminol\Http\Requests\Api\Application\ApplicationApiRequest;

class GetEggRequest extends ApplicationApiRequest
{
    protected ?string $resource = AdminAcl::RESOURCE_EGGS;

    protected int $permission = AdminAcl::READ;
}
