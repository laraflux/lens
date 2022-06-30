<?php

namespace Laraflux\Lens\Traits;

use Illuminate\Database\Eloquent\Relations\morphMany;
use Laraflux\Lens\Models\Log;
use Laraflux\Lens\Observers\ModelObserver;

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

    public function canLog(string $event): bool
    {
        return in_array($event, $this->loggable ?? []);
    }
}
