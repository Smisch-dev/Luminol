<?php

namespace Luminol\Repositories\Eloquent;

use Exception;
use Luminol\Contracts\Repository\PermissionRepositoryInterface;

class PermissionRepository extends EloquentRepository implements PermissionRepositoryInterface
{
    /**
     * Return the model backing this repository.
     *
     * @throws \Exception
     */
    public function model(): string
    {
        throw new Exception('This functionality is not implemented.');
    }
}
