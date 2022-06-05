<?php

namespace Laraflux\Lens\Tests;

use \Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            \Laraflux\Lens\Providers\LensServiceProvider::class,
            \Laraflux\Lens\Providers\EventServiceProvider::class,
        ];
    }
}
