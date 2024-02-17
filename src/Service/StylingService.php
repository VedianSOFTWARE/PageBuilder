<?php

namespace VedianSoftware\Cms\Service;

use VedianSoftware\Cms\Contracts\StylingContract;

class StylingService implements StylingContract
{
    public function __construct()
    {
        $this->add('background', 'red');
        $this->add('color', 'white');
        $this->add('padding', '10px');
        $this->add('margin', '10px');
    }
    
    public function add($key, $value)
    {
        $this->$key = $value;
        
    }
}
