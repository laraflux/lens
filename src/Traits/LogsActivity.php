<?php

namespace Laraflux\Lens\Traits;

use Laraflux\Lens\Models\Log;
use Laraflux\Lens\Observers\ModelObserver;
use Illuminate\Database\Eloquent\Relations\morphMany;

trait LogsActivity
{
    protected static function bootLogsActivity(): void
    {
        static::observe(ModelObserver::class);
    }

    public function logs(): morphMany
    {
        return $this->morphMany(Log::class, 'loggable');
    }
}
