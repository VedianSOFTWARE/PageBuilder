<?php

namespace VedianSoftware\Cms\View\Html;

use Illuminate\View\Component;
use Illuminate\View\View;
use VedianSoftware\Cms\Contracts\View\HtmlContainer;

class Container extends Element implements HtmlContainer
{
    public $class = [
        'bg-white',
        'p-2',
        'rounded-lg',
        'shadow-md'
    ];

    public function render(): View
    {
        return view('vedian::html.container');
    }
}
