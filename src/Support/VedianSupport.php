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
     * The fully qualified class name of the user model.
     *
     * @var string
     */
    public static $userModel = 'App\\Models\\User';

    /**
     * The fully qualified class name of the page model.
     *
     * @var string
     */
    public static $pageModel = 'Vedian\\PageBuilder\\Models\\Page';

    /**
     * The fully qualified class name of the row model.
     *
     * @var string
     */
    public static $rowModel = 'Vedian\\PageBuilder\\Models\\Row';

    /**
     * The fully qualified class name of the column model.
     *
     * @var string
     */
    public static $columnModel = 'Vedian\\PageBuilder\\Models\\Column';

    /**
     * Get the user model.
     *
     * @return string The fully qualified class name of the user model.
     */
    public static function user()
    {
        return static::$userModel;
    }

    /**
     * Get the page model.
     *
     * @return string The fully qualified class name of the page model.
     */
    public static function page()
    {
        return static::$pageModel;
    }

    /**
     * Get the row model.
     *
     * @return string The fully qualified class name of the row model.
     */
    public static function row()
    {
        return static::$rowModel;
    }

    /**
     * Get the column model.
     *
     * @return string The fully qualified class name of the column model.
     */
    public static function column()
    {
        return static::$columnModel;
    }

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
