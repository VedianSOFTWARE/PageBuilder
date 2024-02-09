<?php

namespace VedianSoft\VedianCms\Service;

use VedianSoft\VedianCms\Contracts\ServiceContract;

/**
 * Class PageService
 * 
 * This class represents a Service for creating and modifying page models in the VedianSOFT CMS.
 * It extends the Builder class and implements the ServiceContract interface.
 */
class ContainerService implements ServiceContract
{
    public function __construct(
        public ServiceContract $stylingService,
        public string $class = '',
        public string $maxWidth = '',
        public string $margin = '',
        public string $padding = '',
        public string $sm = '',
        public string $lg = ''
    ) {
        // dd($this->stylingService);
        $this->init();

    }
    
}
