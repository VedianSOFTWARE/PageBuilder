<?php

namespace VedianCMS\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

/**
 * Class PageController
 * @package VedianCMS\Controllers
 */
class PageController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
    
    /**
     * Create a new page.
     *
     * @param PageBuilder $pb The page Service instance.
     * @return int The created page ID.
     */
    public function create()
    {
        // return view('vedian::page.create');
    }
}
