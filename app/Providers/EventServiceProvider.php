<?php

namespace Luminol\Providers;

use Luminol\Models\User;
use Luminol\Models\Server;
use Luminol\Models\Subuser;
use Luminol\Models\EggVariable;
use Luminol\Observers\UserObserver;
use Luminol\Observers\ServerObserver;
use Luminol\Observers\SubuserObserver;
use Luminol\Observers\EggVariableObserver;
use Luminol\Listeners\Auth\AuthenticationListener;
use Luminol\Events\Server\Installed as ServerInstalledEvent;
use Luminol\Notifications\ServerInstalled as ServerInstalledNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     */
    protected $listen = [
        ServerInstalledEvent::class => [ServerInstalledNotification::class],
    ];

    protected $subscribe = [
        AuthenticationListener::class,
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        parent::boot();

        User::observe(UserObserver::class);
        Server::observe(ServerObserver::class);
        Subuser::observe(SubuserObserver::class);
        EggVariable::observe(EggVariableObserver::class);
    }
}
