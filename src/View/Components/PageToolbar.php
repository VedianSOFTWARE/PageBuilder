<?php

namespace VedianSoft\VedianCms\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageToolbar extends ToolbarBase
{
    public array $actions = [
        'addRow',
    ];
}
