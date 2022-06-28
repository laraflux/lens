<?php

namespace Laraflux\Lens\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadMigrationsFrom(__DIR__.'/Helpers/database/migrations');
        $this->artisan('migrate', ['--database' => 'testbench'])->run();
    }

    protected function getPackageProviders($app)
    {
        return [
            \Laraflux\Lens\Providers\LensServiceProvider::class,
            \Laraflux\Lens\Providers\EventServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $lens = include __DIR__.'/../config/lens.php';

        $app['config']->set('lens', $lens);
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }
}
