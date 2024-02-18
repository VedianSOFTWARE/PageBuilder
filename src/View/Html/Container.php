<?php

namespace VedianSoftware\Cms\View\Html;

use VedianSoftware\Cms\Contracts\View\HtmlContainer;

class Container extends Element implements HtmlContainer
{
    public $class = [
        'bg-white',
        'p-2',
        'rounded-lg',
        'shadow-md'
    ];
}
