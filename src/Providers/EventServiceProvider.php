<?php

namespace Laraflux\Lens\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Laraflux\Lens\Models\Log;
use Laraflux\Lens\Observers\LogObserver;

class EventServiceProvider extends ServiceProvider
{
    protected $observers = [
        Log::class => [
            LogObserver::class,
        ],
    ];
}
