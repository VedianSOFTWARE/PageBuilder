<?php

namespace VedianSoft\VedianCms\Controllers;

use VedianSoft\VedianCms\Builders\ColumnBuilder;

class ColumnController extends Controller
{
    public function create(ColumnBuilder $bb)
    {
        dd($bb->getModel(), $this);
        return 666;
    }
}
