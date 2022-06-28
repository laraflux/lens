<?php

namespace Laraflux\Lens\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Laraflux\Lens\Models\Log;

class LogFactory extends Factory
{
    protected $model = Log::class;

    public function definition(): array
    {
        return [
            'loggable_id' => null,
            'loggable_type' => null,
            'event' => 'created',
            'user_id' => null,
            'changes' => null,
            'created_at' => now(),
        ];
    }
}
