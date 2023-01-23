<?php

namespace Luminol\Http\Requests\Api\Client\Servers\Subusers;

use Luminol\Models\Permission;

class DeleteSubuserRequest extends SubuserRequest
{
    public function permission(): string
    {
        return Permission::ACTION_USER_DELETE;
    }
}
