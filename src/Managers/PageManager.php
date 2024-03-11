<?php

namespace Vedian\PageBuilder\Managers;

use Illuminate\Support\Collection;
use Vedian\PageBuilder\Contracts\ManagerContract;
use Vedian\PageBuilder\Contracts\RowManagerContract;

class PageManager implements ManagerContract
{
    public RowManagerContract $rows;

    public function row($data = [])
    {
        dd($this);

        return $this;
    }
}
