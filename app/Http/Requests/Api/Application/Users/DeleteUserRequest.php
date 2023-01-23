<?php

namespace Luminol\Http\Requests\Api\Application\Users;

use Luminol\Services\Acl\Api\AdminAcl;
use Luminol\Http\Requests\Api\Application\ApplicationApiRequest;

class DeleteUserRequest extends ApplicationApiRequest
{
    protected ?string $resource = AdminAcl::RESOURCE_USERS;

    protected int $permission = AdminAcl::WRITE;
}
