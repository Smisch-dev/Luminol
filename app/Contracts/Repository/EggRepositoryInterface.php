<?php

namespace Luminol\Contracts\Repository;

use Luminol\Models\Egg;
use Illuminate\Database\Eloquent\Collection;

interface EggRepositoryInterface extends RepositoryInterface
{
    /**
     * Return an egg with the variables relation attached.
     *
     * @throws \Luminol\Exceptions\Repository\RecordNotFoundException
     */
    public function getWithVariables(int $id): Egg;

    /**
     * Return all eggs and their relations to be used in the daemon API.
     */
    public function getAllWithCopyAttributes(): Collection;

    /**
     * Return an egg with the scriptFrom and configFrom relations loaded onto the model.
     */
    public function getWithCopyAttributes(int|string $value, string $column = 'id'): Egg;

    /**
     * Return all the data needed to export a service.
     *
     * @throws \Luminol\Exceptions\Repository\RecordNotFoundException
     */
    public function getWithExportAttributes(int $id): Egg;

    /**
     * Confirm a copy script belongs to the same nest as the item trying to use it.
     */
    public function isCopyableScript(int $copyFromId, int $service): bool;
}
