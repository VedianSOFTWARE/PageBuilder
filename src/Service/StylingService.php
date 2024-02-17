<?php

namespace VedianSoftware\Cms\Service;

use VedianSoftware\Cms\Contracts\StylingContract;

class StylingService implements StylingContract
{
    public function __construct()
    {
    }

    public function add($key, $value)
    {
        $this->$key = $value;
        
    }
}
