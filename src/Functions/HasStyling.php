<?php

namespace Vedian\PageBuilder\Functions;

use Illuminate\Database\Eloquent\Model as Eloquent;

trait HasCreator
{
    public static function bootHasCreator()
    {
        parent::creating(function (Eloquent $model) {
            $model->created_by = 1;
        });

        parent::updating(function (Eloquent $model) {
            $model->updated_by = auth()->id();
        });

        parent::deleting(function (Eloquent $model) {
            $model->deleted_by = auth()->id();
            $model->save();
        });
    }
}
