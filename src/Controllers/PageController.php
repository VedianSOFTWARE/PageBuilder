<?php

namespace VedianSoft\VedianCms\Controllers;

use VedianSoft\VedianCms\Builders\PageBuilder;

/**
 * Class PageController
 * @package VedianSoft\VedianCms\Controllers
 */
class PageController extends Controller
{
    /**
     * Create a new page.
     *
     * @param PageBuilder $pb The page builder instance.
     * @return int The created page ID.
     */
    public function create(PageBuilder $pb)
    {
        dd($pb->getModel(), $this);
        return view('dashboard');
        return 666;
    }
}
