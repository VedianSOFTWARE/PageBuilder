<?php

namespace VedianSoftware\Cms\View;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use VedianSoftware\Cms\Enumerations\Visibility;

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
