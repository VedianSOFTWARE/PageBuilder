<?php

namespace VedianSoft\VedianCms\View;

use VedianSoft\VedianCms\Contracts\ComponentContract;
use VedianSoft\VedianCms\Contracts\ServiceContract;

class ContainerComponent extends StylingComponent
{
    public function __construct(
        public ComponentContract $stylingComponent,
        public ServiceContract $stylingService
    ) {
        dump($this->stylingComponent, $this->stylingService);
    }
}
