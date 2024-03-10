<?php

namespace Vedian\PageBuilder\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Vedian\PageBuilder\Builders\PageBuilder;

/**
 * Class ColumnController
 * @package Vedian\PageBuilder\Controllers
 */
class ColumnController extends Controller
{
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
