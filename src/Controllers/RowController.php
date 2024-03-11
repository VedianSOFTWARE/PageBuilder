<?php

namespace Vedian\PageBuilder\Controllers;

use Vedian\PageBuilder\Builders\PageBuilder;
use Vedian\PageBuilder\Support\Facades\Vedian;

/**
 * Class RowController
 * @package Vedian\PageBuilder\Controllers
 */
class RowController extends Controller
{
    /**
     * Create a new page.
     *
     * @param PageBuilder $pb The page Service instance.
     * @return int The created page ID.
     */
    public function create()
    {
        return Vedian::view('row.create');
    }
}
