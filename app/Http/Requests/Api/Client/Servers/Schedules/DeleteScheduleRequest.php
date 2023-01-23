<?php

namespace Luminol\Http\Requests\Api\Client\Servers\Schedules;

use Luminol\Models\Permission;

class DeleteScheduleRequest extends ViewScheduleRequest
{
    public function permission(): string
    {
        return Permission::ACTION_SCHEDULE_DELETE;
    }
}
