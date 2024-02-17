<?php

namespace VedianSoft\VedianCms\Controllers;

use VedianSoft\VedianCms\Service\PageService;

/**
 * Class PageController
 * @package VedianSoft\VedianCms\Controllers
 */
class PageController extends Controller
{
    /**
     * Create a new page.
     *
     * @param PageBuilder $pb The page Service instance.
     * @return int The created page ID.
     */
    public function create()
    {
        return view('vedian::page.create');
    }
}
