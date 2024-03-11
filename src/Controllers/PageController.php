<?php

namespace Vedian\PageBuilder\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Vedian\PageBuilder\Builders\Builder;
use Vedian\PageBuilder\Builders\PageBuilder;
use Vedian\PageBuilder\Contracts\PageBuilderContract;
use Vedian\PageBuilder\Models\Page;
use Vedian\PageBuilder\Models\Row;

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
    public function index(PageBuilderContract $builder)
    {
        $builder->make([
            'title' => 'Test page',
            'slug' => 'test-page',
            'description' => 'This is a test page.',
        ]);
        $builder->row([
            'title' => 'Test Row',
            'description' => 'This is a test row.',
        ]);
        dd($builder, $builder->builder, $builder->builder->builder);
        // $builder->builder->add([
        //     'title' => 'Test Column',
        //     'description' => 'This is a test column.',
        // ]);
        $builder->builder->add(['title' => 'Test Row', 'description' => 'This is a test row.']);
        // $builder->builder->add([
        //     'title' => 'Test Column',
        //     'description' => 'This is a test column.',
        // ]);

        dd(
            $builder,
            $builder->builder,
            $builder->builder->builder
        );
        // $builder->save();
        dd($builder, Page::with('rows')->get());
        return Builder::view('page.index');
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
