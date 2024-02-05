<?php

namespace VedianSoft\VedianCms\Views\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class CmsLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('vedian::layouts.cms');
    }
}
