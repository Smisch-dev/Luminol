<?php

namespace Luminol\Repositories\Eloquent;

use Luminol\Models\RecoveryToken;

class RecoveryTokenRepository extends EloquentRepository
{
    public function model(): string
    {
        return RecoveryToken::class;
    }
}
