<?php

namespace VedianSoftware\Cms\Controllers;

use ReflectionClass;
use VedianSoftware\Cms\Contracts\StylingServiceContract;
use VedianSoftware\Cms\Services\ReflectionService;
use VedianSoftware\Cms\Services\StylingService;
use VedianSoftware\Cms\View\Html\Container;

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
