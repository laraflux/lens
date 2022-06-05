<?php

namespace Laraflux\Lens\Observers;

use Illuminate\Database\Eloquent\Model;

class ModelObserver
{
    public function created(Model $model): void
    {
        $model->logs()->create([
            'action' => $this->getActionText($model, 'created'),
            'changes' => json_encode($model),
        ]);
    }

    public function updated(Model $model): void
    {
        $model->logs()->create([
            'action' => $this->getActionText($model, 'updated'),
            'changes' => json_encode($model->getChanges()),
        ]);
    }

    public function deleted(Model $model): void
    {
        $model->logs()->create([
            'action' => $this->getActionText($model, 'deleted'),
            'changes' => json_encode($model),
        ]);
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
