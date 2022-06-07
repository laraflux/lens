<?php

namespace Laraflux\Lens\Observers;

use Illuminate\Database\Eloquent\Model;

class ModelObserver
{
    public function creating(Model $model): void
    {
        if (config('lens.observe.creating')) {
            $model->logs()->create([
                'event' => 'creating',
                'changes' => json_encode($model),
            ]);
        }
    }

    public function created(Model $model): void
    {
        if (config('lens.observe.created')) {
            $model->logs()->create([
                'event' => 'created',
                'changes' => json_encode($model),
            ]);
        }
    }

    public function updating(Model $model): void
    {
        if (config('lens.observe.updating')) {
            $model->logs()->create([
                'event' => 'updated',
                'changes' => json_encode($model->getChanges()),
            ]);
        }
    }

    public function updated(Model $model): void
    {
        if (config('lens.observe.updated')) {
            $model->logs()->create([
                'event' => 'updated',
                'changes' => json_encode($model->getChanges()),
            ]);
        }
    }

    public function saving(Model $model): void
    {
        if (config('lens.observe.saving')) {
            $model->logs()->create([
                'event' => 'saving',
                'changes' => json_encode($model->getChanges()),
            ]);
        }
    }

    public function saved(Model $model): void
    {
        if (config('lens.observe.saved')) {
            $model->logs()->create([
                'event' => 'saved',
                'changes' => json_encode($model->getChanges()),
            ]);
        }
    }

    public function deleting(Model $model): void
    {
        if (config('lens.observe.deleting')) {
            $model->logs()->create([
                'event' => 'deleting',
                'changes' => json_encode($model),
            ]);
        }
    }

    public function deleted(Model $model): void
    {
        if (config('lens.observe.deleted')) {
            $model->logs()->create([
                'event' => 'deleted',
                'changes' => json_encode($model),
            ]);
        }
    }

    public function trashed(Model $model): void
    {
        if (config('lens.observe.trashed')) {
            $model->logs()->create([
                'event' => 'trashed',
                'changes' => json_encode($model),
            ]);
        }
    }

    public function forceDeleted(Model $model): void
    {
        if (config('lens.observe.forceDeleted')) {
            $model->logs()->create([
                'event' => 'forceDeleted',
                'changes' => json_encode($model),
            ]);
        }
    }

    public function restoring(Model $model): void
    {
        if (config('lens.observe.restoring')) {
            $model->logs()->create([
                'event' => 'restoring',
                'changes' => json_encode($model),
            ]);
        }
    }

    public function restored(Model $model): void
    {
        if (config('lens.observe.restored')) {
            $model->logs()->create([
                'event' => 'restored',
                'changes' => json_encode($model),
            ]);
        }
    }

    public function replicating(Model $model): void
    {
        if (config('lens.observe.replicating')) {
            $model->logs()->create([
                'event' => 'replicating',
                'changes' => json_encode($model),
            ]);
        }
    }
}
