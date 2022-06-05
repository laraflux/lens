<?php

namespace Laraflux\Lens\Observers;

use Laraflux\Lens\Models\Log;

class LogObserver
{
    public function creating(Log $log): void
    {
        $log->user_id = auth()->id();
    }
}
