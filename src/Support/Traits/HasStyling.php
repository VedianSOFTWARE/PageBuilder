<?php

namespace Vedian\PageBuilder\Support\Traits;

use Illuminate\Database\Eloquent\Model as Eloquent;

trait HasStyling
{
    public static function bootHasStyling()
    {
        parent::creating(function (Eloquent $model) {
        });

        parent::updating(function (Eloquent $model) {
        });

        parent::deleting(function (Eloquent $model) {
        });
    }
}
