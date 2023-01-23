<?php

namespace Luminol\Facades;

use Illuminate\Support\Facades\Facade;
use Luminol\Services\Activity\ActivityLogTargetableService;

class LogTarget extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ActivityLogTargetableService::class;
    }
}
