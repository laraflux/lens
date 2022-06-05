<?php

namespace Laraflux\Lens\Traits;

use Laraflux\Lens\Models\Log;
use Laraflux\Lens\Observers\LogObserver;
use Illuminate\Database\Eloquent\Relations\morphMany;

trait LogsActivity
{
    protected static function bootLogsActivity(): void
    {
        static::observe(LogObserver::class);
    }

    public function logs(): morphMany
    {
        return $this->morphMany(Log::class, 'loggable');
    }
}
