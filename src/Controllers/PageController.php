<?php

namespace VedianSoftware\Cms\Controllers;

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
    public function create()
    {
        return view('vedian::page.create');
    }
}
