<?php

namespace VedianSoft\VedianCms\Controllers;

use VedianSoft\VedianCms\Service\ColumnService;

class ColumnController extends Controller
{
    public function create(ColumnService $bb)
    {
        dd($bb->getModel(), $this);
        return 666;
    }
}
