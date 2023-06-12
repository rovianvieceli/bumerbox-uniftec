<?php

namespace App\Traits;

trait AuditionTrait
{
    public static function bootAuditionTrait(): void
    {
        self::createdBy();
        self::updatedBy();
        self::modifiedBy();
        self::deletedBy();
    }

    public static function createdBy(): void
    {
        static::creating(function ($model) {
            if (!$model->isDirty('created_by')) {
                $model->created_by = auth()->user()->id;
            }
        });
    }

    public static function updatedBy(): void
    {
        static::creating(function ($model) {
            if ($model->timestamps && !$model->isDirty('updated_by')) {
                $model->updated_by = auth()->user()->id;
            }
        });
    }

    public static function modifiedBy(): void
    {
        static::updating(function ($model) {
            if ($model->timestamps && !$model->isDirty('updated_by')) {
                $model->updated_by = auth()->user()->id;
            }
        });
    }

    public static function deletedBy(): void
    {
        static::deleting(function ($model) {
            if ($model->timestamps && !$model->isDirty('deleted_by')) {
                $model->deleted_by = auth()->user()->id;
            }
        });
    }
}
