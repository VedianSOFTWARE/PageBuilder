<?php

namespace VedianSOFT\CMS\Controllers;

use VedianSOFT\CMS\Builders\ColumnBuilder;

class ColumnController extends Controller
{
    public function create(ColumnBuilder $bb)
    {
        dd($bb->getModel(), $this);
        return 666;
    }
}
