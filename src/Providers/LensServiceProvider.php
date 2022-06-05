<?php

namespace Laraflux\Lens\Providers;

use LaraFlux\Lens\Services\Lens;
use Illuminate\Support\ServiceProvider;

class LensServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerFacade();
        $this->publishConfig();
        $this->publishTranslations();
        $this->publishMigrations();
    }

    public function registerFacade(): void
    {
        $this->app->bind('lens', fn ($app) => new Lens);
    }

    public function publishConfig(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/lens.php' => config_path('lens.php'),
            ], 'lens');
        }
    }

    public function publishTranslations(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../resources/lang' => resource_path('lang'),
            ], 'lens');
        }
    }

    public function publishMigrations(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../database/migrations' => database_path('migrations'),
            ], 'lens');
        }
    }
}
