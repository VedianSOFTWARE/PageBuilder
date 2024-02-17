<?php

namespace VedianSoftware\Cms\View;

use VedianSoftware\Cms\Contracts\ContainerContract;

class Container extends Component implements ContainerContract
{
    public $class = [
        'bg-white',
        'p-2',
        'rounded-lg',
        'shadow-md'
    ];
}
