<?php

namespace Laraflux\Lens\Providers;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;

class LensServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishConfig();
        $this->publishMigrations();
        $this->registerPurgeCommands();
    }

    public function publishConfig(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/lens.php' => config_path('lens.php'),
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

    public function registerPurgeCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Laraflux\Lens\Console\Commands\Lens\PurgeMoreThan::class,
                \Laraflux\Lens\Console\Commands\Lens\PurgeOlderThan::class,
            ]);
            $this->app->booted(function () {
                if (config('lens.purge.auto') === true) {
                    $schedule = $this->app->make(Schedule::class);
                    $schedule->command('lens:purge-more-than')->hourly();
                    $schedule->command('lens:purge-older-than')->daily();
                }
            });
        }
    }
}
