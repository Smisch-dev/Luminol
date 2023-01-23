<?php

namespace Luminol\Http\Controllers\Api\Application\Servers;

use Luminol\Models\Server;
use Luminol\Services\Servers\BuildModificationService;
use Luminol\Services\Servers\DetailsModificationService;
use Luminol\Transformers\Api\Application\ServerTransformer;
use Luminol\Http\Controllers\Api\Application\ApplicationApiController;
use Luminol\Http\Requests\Api\Application\Servers\UpdateServerDetailsRequest;
use Luminol\Http\Requests\Api\Application\Servers\UpdateServerBuildConfigurationRequest;

class ServerDetailsController extends ApplicationApiController
{
    /**
     * ServerDetailsController constructor.
     */
    public function __construct(
        private BuildModificationService $buildModificationService,
        private DetailsModificationService $detailsModificationService
    ) {
        parent::__construct();
    }

    /**
     * Update the details for a specific server.
     *
     * @throws \Luminol\Exceptions\DisplayException
     * @throws \Luminol\Exceptions\Model\DataValidationException
     * @throws \Luminol\Exceptions\Repository\RecordNotFoundException
     */
    public function details(UpdateServerDetailsRequest $request, Server $server): array
    {
        $updated = $this->detailsModificationService->returnUpdatedModel()->handle(
            $server,
            $request->validated()
        );

        return $this->fractal->item($updated)
            ->transformWith($this->getTransformer(ServerTransformer::class))
            ->toArray();
    }

    /**
     * Update the build details for a specific server.
     *
     * @throws \Luminol\Exceptions\DisplayException
     * @throws \Luminol\Exceptions\Model\DataValidationException
     * @throws \Luminol\Exceptions\Repository\RecordNotFoundException
     */
    public function build(UpdateServerBuildConfigurationRequest $request, Server $server): array
    {
        $server = $this->buildModificationService->handle($server, $request->validated());

        return $this->fractal->item($server)
            ->transformWith($this->getTransformer(ServerTransformer::class))
            ->toArray();
    }
}
