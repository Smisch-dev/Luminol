<?php

namespace Luminol\Exceptions\Service;

use Illuminate\Http\Response;
use Luminol\Exceptions\DisplayException;

class HasActiveServersException extends DisplayException
{
    public function getStatusCode(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }
}
