<?php

namespace Laraflux\Lens\Database\Factories;

use Laraflux\Lens\Models\Log;
use Illuminate\Database\Eloquent\Factories\Factory;

class LogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Log::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
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
