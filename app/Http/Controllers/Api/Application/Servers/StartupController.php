<?php

namespace Luminol\Http\Controllers\Api\Application\Servers;

use Luminol\Models\User;
use Luminol\Models\Server;
use Luminol\Services\Servers\StartupModificationService;
use Luminol\Transformers\Api\Application\ServerTransformer;
use Luminol\Http\Controllers\Api\Application\ApplicationApiController;
use Luminol\Http\Requests\Api\Application\Servers\UpdateServerStartupRequest;

class StartupController extends ApplicationApiController
{
    /**
     * StartupController constructor.
     */
    public function __construct(private StartupModificationService $modificationService)
    {
        parent::__construct();
    }

    /**
     * Update the startup and environment settings for a specific server.
     *
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Luminol\Exceptions\Http\Connection\DaemonConnectionException
     * @throws \Luminol\Exceptions\Model\DataValidationException
     * @throws \Luminol\Exceptions\Repository\RecordNotFoundException
     */
    public function index(UpdateServerStartupRequest $request, Server $server): array
    {
        $server = $this->modificationService
            ->setUserLevel(User::USER_LEVEL_ADMIN)
            ->handle($server, $request->validated());

        return $this->fractal->item($server)
            ->transformWith($this->getTransformer(ServerTransformer::class))
            ->toArray();
    }
}
