<?php

namespace VedianSoft\VedianCms\View;

use VedianSoft\VedianCms\Contracts\ComponentContract;

class ContainerComponent extends StylingComponent
{
    public function __construct(
        public ComponentContract $css
    ) {
    }
}
