<?php

namespace VedianSoftware\Cms\Services;

use VedianSoftware\Cms\Contracts\StylingServiceContract;

class StylingService implements StylingServiceContract
{
    public function add($key, $value)
    {
        $this->$key = $value;
    }
}
