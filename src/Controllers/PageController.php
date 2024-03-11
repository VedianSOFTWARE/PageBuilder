<?php

namespace Vedian\PageBuilder\Controllers;

use GuzzleHttp\Psr7\Request;
use Vedian\PageBuilder\Builders\PageBuilder;
use Vedian\PageBuilder\Contracts\Builders\IPageBuilder;
use Vedian\PageBuilder\Models\Row;
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
        $builder->prop('title', 'Test page');
        $builder->prop('slug', 'test-page');
        $builder->prop('description', 'This is a test page.');

        $builder = $builder->create();

        $builder->row([
            'title' => 'Test row',
            'description' => 'This is a test row.',
        ]);

        $builder->row([
            'title' => 'Test row',
            'description' => 'This is a test row.',
        ])
            ->col([
                'title' => 'Test column',
                'description' => 'This is a test column.',
            ])
            ->col([
                'title' => 'Test column',
                'description' => 'This is a test column.',
            ])
            ->col([
                'title' => 'Test column',
                'description' => 'This is a test column.',
            ])
            ->col([
                'title' => 'Test column',
                'description' => 'This is a test column.',
            ])
            ->col([
                'title' => 'Test column',
                'description' => 'This is a test column.',
            ])
            ->col([
                'title' => 'Test column',
                'description' => 'This is a test column.',
            ]);


        $builder->row([
            'title' => 'Test row',
            'description' => 'This is a test row.',
        ])
            ->col([
                'title' => 'Test column',
                'description' => 'This is a test column.',
            ])
            ->col([
                'title' => 'Test column',
                'description' => 'This is a test column.',
            ])
            ->col([
                'title' => 'Test column',
                'description' => 'This is a test column.',
            ])
            ->col([
                'title' => 'Test column',
                'description' => 'This is a test column.',
            ])
            ->col([
                'title' => 'Test column',
                'description' => 'This is a test column.',
            ])
            ->col([
                'title' => 'Test column',
                'description' => 'This is a test column.',
            ]);
        
            dd($builder);

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
