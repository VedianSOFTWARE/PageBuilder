<?php

namespace VedianSoftware\Cms\Controllers;

use VedianSoftware\Cms\Service\PageService;

/**
 * Class PageController
 * @package VedianSoftware\Cms\Controllers
 */
class PageController extends Controller
{
    /**
     * Create a new page.
     *
     * @param PageBuilder $pb The page Service instance.
     * @return int The created page ID.
     */
    public function create(PageService $pb)
    {
        $page = $pb->getModel();

        // dd($page->getFillable());
        return view('vedian::page.create');
    }
}
