<?php

namespace VedianSoft\VedianCms\View\Component;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use VedianSoft\VedianCms\Contracts\ComponentContract;

class Styling extends Component implements ComponentContract
{
    protected string $viewName = 'css';

    public function __construct()
    {
        $this->setViewName($this->viewName);
    }

    private function setViewName(string $viewName): void
    {
        $this->viewName = $viewName;
    }

    public function getViewName(): string
    {
        return $this->viewName;
    }

    public function render(): View|Htmlable|\Closure|string
    {
        return view("vedian::parts.{$this->getViewName()}");
    }
}
