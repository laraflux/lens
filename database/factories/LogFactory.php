<?php

namespace Laraflux\Lens\Database\Factories;

use Laraflux\Lens\Models\Log;
use Illuminate\Database\Eloquent\Factories\Factory;

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
