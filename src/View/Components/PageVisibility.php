<?php

namespace VedianSoft\VedianCms\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use VedianSoft\VedianCms\Enumerations\Visibility;

class PageVisibility extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct(
        public $options = []
    )
    {
        $this->options = Visibility::cases();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('vedian::components.page-visibility');
    }
}
