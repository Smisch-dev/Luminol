<?php

namespace Luminol\Http\Requests\Api\Client\Servers\Files;

use Luminol\Models\Permission;
use Luminol\Contracts\Http\ClientPermissionsRequest;
use Luminol\Http\Requests\Api\Client\ClientApiRequest;

class CopyFileRequest extends ClientApiRequest implements ClientPermissionsRequest
{
    public function permission(): string
    {
        return Permission::ACTION_FILE_CREATE;
    }

    public function rules(): array
    {
        return [
            'location' => 'required|string',
        ];
    }
}
