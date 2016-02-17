<?php

namespace Ensured\Traits;

use Ensured\Entities\Activity;
use ReflectionClass;

trait RecordsActivity
{

	protected static function boot()
    {
        parent::boot();
        foreach (static::getModelEvents() as $event) {
            static::$event(function($model) use ($event) {
                $model->addActivity($event);
            });           
        }
    }

    protected function AddActivity($event)
    {
        Activity::create([
        'subject_id' => $this->id,
        'subject_type' => get_class($this),
        'name' => $this->getActivityName($this, $event),
        'user_id' => $this->user_id
        ]);
    }

    protected function getActivityName($model, $action)
    {
        $name = strtolower((new ReflectionClass($model))->getShortName());
        return "{$action}_{$name}";
    }

    protected static function getModelEvents()
    {
        if (isset(static::$recordEvents)) {
            return static::$recordEvents;
        }

        return [
            'created', 'deleted', 'updated'
        ];
    }

}