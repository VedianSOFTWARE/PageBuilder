<?php

namespace Vedian\PageBuilder\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Vedian\PageBuilder\Builders\PageBuilder;

/**
 * Class PageController
 * @package Vedian\PageBuilder\Controllers
 */
class PageController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Show the page index.
     *
     * @param PageBuilder $pb The page Service instance.
     * @return \Illuminate\View\View The page index view.
     */
    public function index()
    {
        return PageBuilder::view('page.index');
    }

    /**
     * Create a new page.
     *
     * @param PageBuilder $pb The page Service instance.
     * @return int The created page ID.
     */
    public function create()
    {
        return PageBuilder::view('page.create');
    }
}
