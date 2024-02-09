<?php

namespace VedianSoft\VedianCms\Service;

use VedianSoft\VedianCms\Contracts\StylingServiceContract;

class ContainerService extends StylingService implements StylingServiceContract
{
    public function __construct(
        public StylingServiceContract $css
    ) {
        dump($this->css);
    }
}
