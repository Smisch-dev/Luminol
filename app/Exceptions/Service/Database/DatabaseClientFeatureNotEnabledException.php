<?php

namespace Luminol\Exceptions\Service\Database;

use Luminol\Exceptions\LuminolException;

class DatabaseClientFeatureNotEnabledException extends LuminolException
{
    public function __construct()
    {
        parent::__construct('Client database creation is not enabled in this Panel.');
    }
}
