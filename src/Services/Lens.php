<?php

namespace LaraFlux\Lens\Services;

use Laraflux\Lens\Models\Log;
use Illuminate\Database\Eloquent\Model;

class Lens
{
    public function log(string $text): void
    {
        Log::create([
            'action' => $text,
        ]);
    }
}
