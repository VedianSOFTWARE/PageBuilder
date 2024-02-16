<?php

namespace VedianSoft\VedianCms\View\Component;

use VedianSoft\VedianCms\Contracts\StylingContract;
use VedianSoft\VedianCms\View\ViewComponent;

class Container extends ViewComponent
{
    protected string $name = 'container';
    
    public function __construct(
        public StylingContract $styling
    ) {
        dump($this);
    }
}
