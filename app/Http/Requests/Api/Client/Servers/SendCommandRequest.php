<?php

namespace Luminol\Http\Requests\Api\Client\Servers;

use Luminol\Models\Permission;
use Luminol\Http\Requests\Api\Client\ClientApiRequest;

class SendCommandRequest extends ClientApiRequest
{
    /**
     * Determine if the API user has permission to perform this action.
     */
    public function permission(): string
    {
        return Permission::ACTION_CONTROL_CONSOLE;
    }

    /**
     * Rules to validate this request against.
     */
    public function rules(): array
    {
        return [
            'command' => 'required|string|min:1',
        ];
    }
}
