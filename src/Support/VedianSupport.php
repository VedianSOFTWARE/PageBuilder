<?php

namespace Vedian\PageBuilder\Support;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Vedian\PageBuilder\Builders\ColumnBuilder;
use Vedian\PageBuilder\Builders\PageBuilder;
use Vedian\PageBuilder\Builders\RowBuilder;
use Vedian\PageBuilder\Contracts\ColumnBuilderContract;
use Vedian\PageBuilder\Contracts\PageBuilderContract;
use Vedian\PageBuilder\Contracts\RowBuilderContract;

class VedianSupport
{
    /**
     * Get the view for the page builder.
     *
     * @param string $view The view to retrieve.
     * @return string The view for the page builder.
     */
    public static function view($view, $data = [], $mergeData = []): View|Factory
    {
        return view("pagebuilder::{$view}", $data, $mergeData);
    }

    /**
     * Build pages using the given model.
     *
     * @param string $model The model to use.
     * @return void
     */
    public static function buildPagesUsing(string $model)
    {
        return app()->singleton(PageBuilderContract::class, function ($app) use ($model) {
            return new PageBuilder(
                $app->make($model),
                $app->make(RowBuilderContract::class)
            );
        });
    }

    /**
     * Build rows using the given model.
     *
     * @param string $model The model to use.
     * @return void
     */
    public static function buildRowsUsing(string $model)
    {
        return app()->singleton(RowBuilderContract::class, function ($app) use ($model) {
            return new RowBuilder(
                $app->make($model),
                $app->make(ColumnBuilderContract::class)
            );
        });
    }

    /**
     * Build columns using the given model.
     *
     * @param string $model The model to use.
     * @return void
     */
    public static function buildColumnsUsing(string $model)
    {
        return app()->singleton(ColumnBuilderContract::class, function ($app) use ($model) {
            return new ColumnBuilder(
                $app->make($model),
            );
        });
    }
}
