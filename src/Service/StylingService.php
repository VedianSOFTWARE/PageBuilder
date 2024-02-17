<?php

namespace VedianSoftware\Cms\Service;

use VedianSoftware\Cms\Contracts\StylingServiceContract;

class StylingService implements StylingServiceContract
{
    public function add($key, $value)
    {
        $this->$key = $value;
    }
}
