<?php

namespace Laraflux\Lens\Observers;

use Illuminate\Database\Eloquent\Model;

class ModelObserver
{
    public function creating(Model $model): void
    {
        if (config('lens.observe.creating')) {
            $model->logs()->create([
                'action' => $this->getActionText($model, 'creating'),
                'changes' => json_encode($model),
            ]);
        }
    }

    public function created(Model $model): void
    {
        if (config('lens.observe.created')) {
            $model->logs()->create([
                'action' => $this->getActionText($model, 'created'),
                'changes' => json_encode($model),
            ]);
        }
    }

    public function updating(Model $model): void
    {
        if (config('lens.observe.updating')) {
            $model->logs()->create([
                'action' => $this->getActionText($model, 'updated'),
                'changes' => json_encode($model->getChanges()),
            ]);
        }
    }

    public function updated(Model $model): void
    {
        if (config('lens.observe.updated')) {
            $model->logs()->create([
                'action' => $this->getActionText($model, 'updated'),
                'changes' => json_encode($model->getChanges()),
            ]);
        }
    }

    public function saving(Model $model): void
    {
        if (config('lens.observe.saving')) {
            $model->logs()->create([
                'action' => $this->getActionText($model, 'saving'),
                'changes' => json_encode($model->getChanges()),
            ]);
        }
    }

    public function saved(Model $model): void
    {
        if (config('lens.observe.saved')) {
            $model->logs()->create([
                'action' => $this->getActionText($model, 'saved'),
                'changes' => json_encode($model->getChanges()),
            ]);
        }
    }

    public function deleting(Model $model): void
    {
        if (config('lens.observe.deleting')) {
            $model->logs()->create([
                'action' => $this->getActionText($model, 'deleting'),
                'changes' => json_encode($model),
            ]);
        }
    }

    public function deleted(Model $model): void
    {
        if (config('lens.observe.deleted')) {
            $model->logs()->create([
                'action' => $this->getActionText($model, 'deleted'),
                'changes' => json_encode($model),
            ]);
        }
    }

    public function trashed(Model $model): void
    {
        if (config('lens.observe.trashed')) {
            $model->logs()->create([
                'action' => $this->getActionText($model, 'trashed'),
                'changes' => json_encode($model),
            ]);
        }
    }

    public function forceDeleted(Model $model): void
    {
        if (config('lens.observe.forceDeleted')) {
            $model->logs()->create([
                'action' => $this->getActionText($model, 'forceDeleted'),
                'changes' => json_encode($model),
            ]);
        }
    }

    public function restoring(Model $model): void
    {
        if (config('lens.observe.restoring')) {
            $model->logs()->create([
                'action' => $this->getActionText($model, 'restoring'),
                'changes' => json_encode($model),
            ]);
        }
    }

    public function restored(Model $model): void
    {
        if (config('lens.observe.restored')) {
            $model->logs()->create([
                'action' => $this->getActionText($model, 'restored'),
                'changes' => json_encode($model),
            ]);
        }
    }

    public function replicating(Model $model): void
    {
        if (config('lens.observe.replicating')) {
            $model->logs()->create([
                'action' => $this->getActionText($model, 'replicating'),
                'changes' => json_encode($model),
            ]);
        }
    }

    protected function getActionText(Model $model, string $action): string
    {
        $identifier = config('lens.user.identifier', 'name');

        return __('lens.' . $action, [
            'identifier' => auth()->user()->$identifier ?? 'A guest',
            'model' => strtolower(class_basename($model)),
        ]);
    }
}
