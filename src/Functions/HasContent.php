<?php

namespace Vedian\PageBuilder\Functions;

use Illuminate\Database\Eloquent\Model as Eloquent;

trait HasContent
{
    public function content()
    {
        return $this->morphOne('Vedian\PageBuilder\Models\Content', 'contentable');
    }
}
