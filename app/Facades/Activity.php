<?php

namespace Luminol\Facades;

use Illuminate\Support\Facades\Facade;
use Luminol\Services\Activity\ActivityLogService;

class Activity extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ActivityLogService::class;
    }
}
