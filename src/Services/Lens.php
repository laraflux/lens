<?php

namespace LaraFlux\Lens\Services;

use Laraflux\Lens\Models\Log;
use Illuminate\Database\Eloquent\Model;

class Lens
{
    public function log(string $text, ?Model $model = null): void
    {
        $model
            ? $this->createWithModel($text, $model)
            : $this->create($text);
    }

    protected function create(string $text): void
    {
        Log::create([
            'action' => $text,
        ]);
    }

    protected function createWithModel(string $text, Model $model): void
    {
        Log::create([
            'action' => $text,
            'loggable_type' => $model::class,
            'loggable_id' => $model->id,
        ]);
    }
}
