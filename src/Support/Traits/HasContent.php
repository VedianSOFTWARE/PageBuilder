<?php

namespace Vedian\PageBuilder\Support\Traits;

use Illuminate\Database\Eloquent\Model as Eloquent;

trait HasContent
{
    public function content()
    {
        return $this->morphOne('Vedian\PageBuilder\Models\Content', 'contentable');
    }
}
