<?php

namespace Laraflux\Lens\Providers;

use Laraflux\Lens\Models\Log;
use Laraflux\Lens\Observers\LogObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $observers = [
        Log::class => [
            LogObserver::class
        ],
    ];
}
