<?php

namespace VedianSOFT\CMS\Controllers;

use VedianSOFT\CMS\Builders\PageBuilder;

class PageController extends Controller
{
    public function index()
    {
        $pb = new PageBuilder();
        dd($pb);
        return 666;
    }
}
