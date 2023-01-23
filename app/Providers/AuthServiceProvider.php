<?php

namespace Luminol\Providers;

use Laravel\Sanctum\Sanctum;
use Luminol\Models\ApiKey;
use Luminol\Models\Server;
use Luminol\Policies\ServerPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     */
    protected $policies = [
        Server::class => ServerPolicy::class,
    ];

    public function boot()
    {
        Sanctum::usePersonalAccessTokenModel(ApiKey::class);

        $this->registerPolicies();
    }

    public function register()
    {
        Sanctum::ignoreMigrations();
    }
}
