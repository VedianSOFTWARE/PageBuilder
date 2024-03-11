<?php

namespace Vedian\PageBuilder\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Vedian\PageBuilder\Builders\PageBuilder;
use Vedian\PageBuilder\Support\Facades\Vedian;

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
        return Vedian::view('page.create');
    }
}
