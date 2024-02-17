<?php

namespace VedianSoftware\Cms\View;

use ReflectionClass;
use VedianSoftware\Cms\Contracts\ReflectionClassContract;
use VedianSoftware\Cms\Contracts\ReflectionContract;

class Container extends Component
{
    public array $classes = [
        'padding' => 2,
        'margin' => 2,
    ];
}
