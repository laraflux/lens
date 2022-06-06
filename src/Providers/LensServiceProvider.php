<?php

namespace Laraflux\Lens\Providers;

use Illuminate\Support\ServiceProvider;

class LensServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishConfig();
        $this->publishTranslations();
        $this->publishMigrations();
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
                __DIR__.'/../../lang' => lang_path(),
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
