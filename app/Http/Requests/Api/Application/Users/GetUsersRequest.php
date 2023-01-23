<?php

namespace Luminol\Http\Requests\Api\Application\Users;

use Luminol\Services\Acl\Api\AdminAcl as Acl;
use Luminol\Http\Requests\Api\Application\ApplicationApiRequest;

class GetUsersRequest extends ApplicationApiRequest
{
    protected ?string $resource = Acl::RESOURCE_USERS;

    protected int $permission = Acl::READ;
}
