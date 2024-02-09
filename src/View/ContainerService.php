<?php

namespace VedianSoft\VedianCms\Service;

use VedianSoft\VedianCms\Contracts\CssServiceContract;

class ContainerService extends CssService implements CssServiceContract
{
    public function __construct(
        public CssServiceContract $css
    ) {
    }
}
