<?php

namespace VedianSoft\VedianCms\View\Parts;

use Illuminate\View\Component;
use VedianSoft\VedianCms\Classes\Css;

class Container extends Component
{

    public function __construct(
        public Css $class,
        // public string $id = '',
        // public string $class = 'max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8',
        // public string $maxWidth = 'max-w-7xl',

        // public string $py = 'py-6',
        // public string $px = 'px-4',
        // public string $sm = 'sm:px-6',
        // public string $lg = 'lg:px-8',

        // public string $style = '',
    ) {
        //
    }

    public function render()
    {
        return view('vedian::parts.container');
    }
}
