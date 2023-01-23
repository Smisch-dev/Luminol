<?php

namespace Luminol\Repositories\Eloquent;

use Luminol\Models\User;
use Luminol\Contracts\Repository\UserRepositoryInterface;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    /**
     * Return the model backing this repository.
     */
    public function model(): string
    {
        return User::class;
    }
}
