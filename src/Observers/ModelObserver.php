<?php

namespace Laraflux\Lens\Observers;

use Illuminate\Database\Eloquent\Model;

class ModelObserver
{
    public function retrieved(Model $model): void
    {
        if ($model->canLog('retrieved')) {
            $model->logs()->create([
                'event' => 'retrieved',
            ]);
        }
    }

    public function creating(Model $model): void
    {
        if ($model->canLog('creating')) {
            $model->logs()->create([
                'event' => 'creating',
                'changes' => json_encode($model),
            ]);
        }
    }

    public function created(Model $model): void
    {
        if ($model->canLog('created')) {
            $model->logs()->create([
                'event' => 'created',
                'changes' => json_encode($model),
            ]);
        }
    }

    public function updating(Model $model): void
    {
        if ($model->canLog('updating')) {
            $model->logs()->create([
                'event' => 'updated',
                'changes' => json_encode($model->getChanges()),
            ]);
        }
    }

    public function updated(Model $model): void
    {
        if ($model->canLog('updated')) {
            $model->logs()->create([
                'event' => 'updated',
                'changes' => json_encode($model->getChanges()),
            ]);
        }
    }

    public function saving(Model $model): void
    {
        if ($model->canLog('saving')) {
            $model->logs()->create([
                'event' => 'saving',
                'changes' => json_encode($model->getChanges()),
            ]);
        }
    }

    public function saved(Model $model): void
    {
        if ($model->canLog('saved')) {
            $model->logs()->create([
                'event' => 'saved',
                'changes' => json_encode($model->getChanges()),
            ]);
        }
    }

    public function deleting(Model $model): void
    {
        if ($model->canLog('deleting')) {
            $model->logs()->create([
                'event' => 'deleting',
                'changes' => json_encode($model),
            ]);
        }
    }

    public function deleted(Model $model): void
    {
        if ($model->canLog('deleted')) {
            $model->logs()->create([
                'event' => 'deleted',
                'changes' => json_encode($model),
            ]);
        }
    }

    public function trashed(Model $model): void
    {
        if ($model->canLog('trashed')) {
            $model->logs()->create([
                'event' => 'trashed',
                'changes' => json_encode($model),
            ]);
        }
    }

    public function forceDeleted(Model $model): void
    {
        if ($model->canLog('forceDeleted')) {
            $model->logs()->create([
                'event' => 'forceDeleted',
                'changes' => json_encode($model),
            ]);
        }
    }

    public function restoring(Model $model): void
    {
        if ($model->canLog('restoring')) {
            $model->logs()->create([
                'event' => 'restoring',
                'changes' => json_encode($model),
            ]);
        }
    }

    public function restored(Model $model): void
    {
        if ($model->canLog('restored')) {
            $model->logs()->create([
                'event' => 'restored',
                'changes' => json_encode($model),
            ]);
        }
    }

    public function replicating(Model $model): void
    {
        if ($model->canLog('replicating')) {
            $model->logs()->create([
                'event' => 'replicating',
                'changes' => json_encode($model),
            ]);
        }
    }
}
