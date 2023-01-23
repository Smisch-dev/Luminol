<?php

namespace Luminol\Http\Controllers\Api\Application\Nests;

use Luminol\Models\Egg;
use Luminol\Models\Nest;
use Luminol\Transformers\Api\Application\EggTransformer;
use Luminol\Http\Requests\Api\Application\Nests\Eggs\GetEggRequest;
use Luminol\Http\Requests\Api\Application\Nests\Eggs\GetEggsRequest;
use Luminol\Http\Controllers\Api\Application\ApplicationApiController;

class EggController extends ApplicationApiController
{
    /**
     * Return all eggs that exist for a given nest.
     */
    public function index(GetEggsRequest $request, Nest $nest): array
    {
        return $this->fractal->collection($nest->eggs)
            ->transformWith($this->getTransformer(EggTransformer::class))
            ->toArray();
    }

    /**
     * Return a single egg that exists on the specified nest.
     */
    public function view(GetEggRequest $request, Nest $nest, Egg $egg): array
    {
        return $this->fractal->item($egg)
            ->transformWith($this->getTransformer(EggTransformer::class))
            ->toArray();
    }
}
