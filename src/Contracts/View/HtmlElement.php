<?php

namespace VedianSoftware\Cms\Contracts\View;

use Illuminate\Support\Collection;

interface HtmlElement
{
    public function render();
    public function viewPath();

}
