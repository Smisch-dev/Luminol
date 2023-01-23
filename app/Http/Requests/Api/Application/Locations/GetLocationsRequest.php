<?php

namespace Luminol\Http\Requests\Api\Application\Locations;

use Luminol\Services\Acl\Api\AdminAcl;
use Luminol\Http\Requests\Api\Application\ApplicationApiRequest;

class GetLocationsRequest extends ApplicationApiRequest
{
    protected ?string $resource = AdminAcl::RESOURCE_LOCATIONS;

    protected int $permission = AdminAcl::READ;
}
