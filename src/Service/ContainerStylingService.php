<?php

namespace VedianSoft\VedianCms\Service;

use VedianSoft\VedianCms\Contracts\ServiceContract;
use VedianSoft\VedianCms\Contracts\StylingContract;

/**
 * Class PageService
 * 
 * This class represents a Service for creating and modifying page models in the VedianSOFT CMS.
 * It extends the Builder class and implements the ServiceContract interface.
 */
class ContainerStylingService extends StylingService
{
    public function __construct(
        public string $maxWidth = 'max-w-7xl',
        public string $margin = 'mx-auto',
        public string $padding = 'py-6 px-4',
        public string $sm = 'sm:px-6',
        public string $lg = 'lg:px-8'
    ) {
        $this->init();
    }
}
