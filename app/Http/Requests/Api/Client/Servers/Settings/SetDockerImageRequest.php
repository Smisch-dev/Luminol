<?php

namespace Luminol\Http\Requests\Api\Client\Servers\Settings;

use Webmozart\Assert\Assert;
use Luminol\Models\Server;
use Illuminate\Validation\Rule;
use Luminol\Models\Permission;
use Luminol\Contracts\Http\ClientPermissionsRequest;
use Luminol\Http\Requests\Api\Client\ClientApiRequest;

class SetDockerImageRequest extends ClientApiRequest implements ClientPermissionsRequest
{
    public function permission(): string
    {
        return Permission::ACTION_STARTUP_DOCKER_IMAGE;
    }

    public function rules(): array
    {
        /** @var \Luminol\Models\Server $server */
        $server = $this->route()->parameter('server');

        Assert::isInstanceOf($server, Server::class);

        return [
            'docker_image' => ['required', 'string', Rule::in(array_values($server->egg->docker_images))],
        ];
    }
}
