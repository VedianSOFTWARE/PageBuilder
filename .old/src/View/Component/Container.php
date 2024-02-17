<?php

namespace VedianSoft\VedianCms\View\Component;

use VedianSoft\VedianCms\Contracts\ComponentContract;
use VedianSoft\VedianCms\Contracts\ServiceContract;
use VedianSoft\VedianCms\View\Component\Styling;

class Container extends Styling
{
    public function __construct(
        public ComponentContract $stylingComponent,
        public ServiceContract $stylingService
    ) {
        dump($this->stylingComponent, $this->stylingService);
    }
}
