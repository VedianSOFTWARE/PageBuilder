<?php

namespace VedianSOFT\CMS\Controllers;

use VedianSOFT\CMS\Builders\PageBuilder;

class PageController extends Controller
{
    public function create(PageBuilder $pb)
    {
        dd($pb->getModel(), $this);
        return 666;
    }
}
