<?php

namespace Luminol\Facades;

use Illuminate\Support\Facades\Facade;
use Luminol\Services\Activity\ActivityLogBatchService;

class LogBatch extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ActivityLogBatchService::class;
    }
}
