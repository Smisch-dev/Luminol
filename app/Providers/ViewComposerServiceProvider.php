<?php

namespace Luminol\Providers;

use Illuminate\Support\ServiceProvider;
use Luminol\Http\ViewComposers\AssetComposer;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function boot()
    {
        $this->app->make('view')->composer('*', AssetComposer::class);
    }
}
