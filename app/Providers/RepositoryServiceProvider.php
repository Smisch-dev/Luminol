<?php

namespace Luminol\Providers;

use Illuminate\Support\ServiceProvider;
use Luminol\Repositories\Eloquent\EggRepository;
use Luminol\Repositories\Eloquent\NestRepository;
use Luminol\Repositories\Eloquent\NodeRepository;
use Luminol\Repositories\Eloquent\TaskRepository;
use Luminol\Repositories\Eloquent\UserRepository;
use Luminol\Repositories\Eloquent\ApiKeyRepository;
use Luminol\Repositories\Eloquent\ServerRepository;
use Luminol\Repositories\Eloquent\SessionRepository;
use Luminol\Repositories\Eloquent\SubuserRepository;
use Luminol\Repositories\Eloquent\DatabaseRepository;
use Luminol\Repositories\Eloquent\LocationRepository;
use Luminol\Repositories\Eloquent\ScheduleRepository;
use Luminol\Repositories\Eloquent\SettingsRepository;
use Luminol\Repositories\Eloquent\AllocationRepository;
use Luminol\Contracts\Repository\EggRepositoryInterface;
use Luminol\Repositories\Eloquent\EggVariableRepository;
use Luminol\Contracts\Repository\NestRepositoryInterface;
use Luminol\Contracts\Repository\NodeRepositoryInterface;
use Luminol\Contracts\Repository\TaskRepositoryInterface;
use Luminol\Contracts\Repository\UserRepositoryInterface;
use Luminol\Repositories\Eloquent\DatabaseHostRepository;
use Luminol\Contracts\Repository\ApiKeyRepositoryInterface;
use Luminol\Contracts\Repository\ServerRepositoryInterface;
use Luminol\Repositories\Eloquent\ServerVariableRepository;
use Luminol\Contracts\Repository\SessionRepositoryInterface;
use Luminol\Contracts\Repository\SubuserRepositoryInterface;
use Luminol\Contracts\Repository\DatabaseRepositoryInterface;
use Luminol\Contracts\Repository\LocationRepositoryInterface;
use Luminol\Contracts\Repository\ScheduleRepositoryInterface;
use Luminol\Contracts\Repository\SettingsRepositoryInterface;
use Luminol\Contracts\Repository\AllocationRepositoryInterface;
use Luminol\Contracts\Repository\EggVariableRepositoryInterface;
use Luminol\Contracts\Repository\DatabaseHostRepositoryInterface;
use Luminol\Contracts\Repository\ServerVariableRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register all of the repository bindings.
     */
    public function register()
    {
        // Eloquent Repositories
        $this->app->bind(AllocationRepositoryInterface::class, AllocationRepository::class);
        $this->app->bind(ApiKeyRepositoryInterface::class, ApiKeyRepository::class);
        $this->app->bind(DatabaseRepositoryInterface::class, DatabaseRepository::class);
        $this->app->bind(DatabaseHostRepositoryInterface::class, DatabaseHostRepository::class);
        $this->app->bind(EggRepositoryInterface::class, EggRepository::class);
        $this->app->bind(EggVariableRepositoryInterface::class, EggVariableRepository::class);
        $this->app->bind(LocationRepositoryInterface::class, LocationRepository::class);
        $this->app->bind(NestRepositoryInterface::class, NestRepository::class);
        $this->app->bind(NodeRepositoryInterface::class, NodeRepository::class);
        $this->app->bind(ScheduleRepositoryInterface::class, ScheduleRepository::class);
        $this->app->bind(ServerRepositoryInterface::class, ServerRepository::class);
        $this->app->bind(ServerVariableRepositoryInterface::class, ServerVariableRepository::class);
        $this->app->bind(SessionRepositoryInterface::class, SessionRepository::class);
        $this->app->bind(SettingsRepositoryInterface::class, SettingsRepository::class);
        $this->app->bind(SubuserRepositoryInterface::class, SubuserRepository::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
