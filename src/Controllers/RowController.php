<?php

namespace VedianSOFT\CMS\Controllers;

use VedianSOFT\CMS\Builders\RowBuilder;

class RowController extends Controller
{
    public function create(RowBuilder $pb)
    {
        dd($pb->getModel(), $this);
        return 666;
    }
}
