<?php

namespace Vedian\PageBuilder\Support;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Vedian\PageBuilder\Builders\ColumnBuilder;
use Vedian\PageBuilder\Builders\PageBuilder;
use Vedian\PageBuilder\Builders\RowBuilder;
use Vedian\PageBuilder\Contracts\Builders\IColumnBuilder;
use Vedian\PageBuilder\Contracts\Builders\IPageBuilder;
use Vedian\PageBuilder\Contracts\Builders\IRowBuilder;

class VedianSupport
{
    /**
     * Get the view for the page builder.
     *
     * @param string $view The view to retrieve.
     * @return string The view for the page builder.
     */
    public function view($view, $data = [], $mergeData = []): View|Factory
    {
        return view("pagebuilder::{$view}", $data, $mergeData);
    }

    /**
     * Build pages using the given model.
     *
     * @param string $model The model to use.
     * @return void
     */
    public function buildPagesUsing(string $model)
    {
        return app()->singleton(IPageBuilder::class, function ($app) use ($model) {
            return new PageBuilder(
                $app->make($model),
                $app->make(IRowBuilder::class)
            );
        });
    }

    /**
     * Build rows using the given model.
     *
     * @param string $model The model to use.
     * @return void
     */
    public function buildRowsUsing(string $model)
    {
        return app()->singleton(IRowBuilder::class, function ($app) use ($model) {
            return new RowBuilder(
                $app->make($model),
                $app->make(IColumnBuilder::class)
            );
        });
    }

    /**
     * Build columns using the given model.
     *
     * @param string $model The model to use.
     * @return void
     */
    public function buildColumnsUsing(string $model)
    {
        return app()->singleton(IColumnBuilder::class, function ($app) use ($model) {
            return new ColumnBuilder(
                $app->make($model),
            );
        });
    }
}
