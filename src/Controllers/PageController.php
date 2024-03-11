<?php

namespace Vedian\PageBuilder\Controllers;

use GuzzleHttp\Psr7\Request;
use Vedian\PageBuilder\Builders\PageBuilder;
use Vedian\PageBuilder\Contracts\Builders\IPageBuilder;
use Vedian\PageBuilder\Support\Facades\Vedian;

/**
 * Class PageController
 * @package Vedian\PageBuilder\Controllers
 */
class PageController extends Controller
{

    /**
     * Show the page index.
     *
     * @param PageBuilder $pb The page Service instance.
     * @return \Illuminate\View\View The page index view.
     */
    public function index(IPageBuilder $builder)
    {
        $builder->title = 'Test page';
        $builder->slug  = 'test-page';
        $builder->description = 'This is a test page.';

        $p = $builder->create();
        
        $p->row([
            'title' => 'Test row',
            'description' => 'This is a test row.',
        ]);
        dd($p);

        $page = $builder->make([
            'title' => 'Test page',
            'slug' => 'test-page',
            'description' => 'This is a test page.',
        ]);

        dd($builder, $page);

        return Vedian::view('page.index');
    }

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

    /**
     * Store a new page.
     *
     * @param PageBuilder $pb The page Service instance.
     * @return int The created page ID.
     */
    public function store(Request $request, IPageBuilder $builder)
    {
    }
}
