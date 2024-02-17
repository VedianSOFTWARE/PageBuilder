<?php

namespace VedianSoft\VedianCms\View;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;
use VedianSoft\VedianCms\Contracts\StylingContract;
use VedianSoft\VedianCms\Contracts\ViewContract;

class ViewComponent extends Component implements ViewContract
{
    protected string $name = 'default';


    public function __construct(
        public StylingContract $styling,
    ) {
    }

    private function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function render(): View|Htmlable|\Closure|string
    {
        return view("vedian::parts.{$this->getName()}");
    }
}
