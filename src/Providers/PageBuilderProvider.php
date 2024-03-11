<?php

namespace Vedian\PageBuilder\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Vedian\PageBuilder\Builders\Builder;
use Vedian\PageBuilder\Builders\ColumnBuilder;
use Vedian\PageBuilder\Builders\PageBuilder;
use Vedian\PageBuilder\Builders\RowBuilder;
use Vedian\PageBuilder\Contracts\BuilderContract;
use Vedian\PageBuilder\Contracts\ColumnBuilderContract;
use Vedian\PageBuilder\Contracts\ModelContract;
use Vedian\PageBuilder\Contracts\PageBuilderContract;
use Vedian\PageBuilder\Contracts\RowBuilderContract;
use Vedian\PageBuilder\Contracts\RowContract;
use Vedian\PageBuilder\Contracts\RowManagerContract;
use Vedian\PageBuilder\Controllers\PageController;
use Vedian\PageBuilder\Managers\RowManager;
use Vedian\PageBuilder\Models\Column;
use Vedian\PageBuilder\Models\Page;
use Vedian\PageBuilder\Models\Row;
use Vedian\PageBuilder\Support\Migration\PageSchema;
use Vedian\PageBuilder\Support\Paths;

/**
 * Class CmsServiceProvider
 * 
 * The service provider for the Vedian CMS.
 *
 * @package Cms
 */
class PageBuilderProvider extends ServiceProvider
{
    /** 
     * 
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->binding();
        $this->merging();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishing();
        $this->loading();
        $this->componentNamespaces();
    }

    /**
     * Register the component namespaces.
     *
     * @return void
     */
    protected function componentNamespaces()
    {
        Blade::componentNamespace('PageBuilder\\View', 'pagebuilder');
    }

    /**
     * Publish the package resources.
     *
     * @return void
     */
    protected function publishing()
    {
        $this->publishes([
            Paths::database('migrations') => database_path('migrations/pagebuilder')
        ], 'pagebuilder-migrations');

        $this->publishes([
            Paths::views() => resource_path('views/vendor/pagebuilder'),
        ], 'pagebuilder-views');
    }

    /**
     * Load the package resources.
     *
     * @return void
     */
    protected function loading()
    {
        $this->loadMigrationsFrom(Paths::database('migrations'));
        $this->loadViewsFrom(Paths::views(), 'pagebuilder');
        $this->loadRoutesFrom(Paths::routes('web'));
    }

    /**
     * Merge the package configuration.
     *
     * @return void
     */
    protected function merging()
    {
        $this->mergeConfigFrom(Paths::config('pagebuilder'), 'pagebuilder');
    }

    /**
     * Bind the service container.
     *
     * @return void
     */
    protected function binding()
    {
        $this->facades();
        $this->bindPageBuilder();
        $this->bindRowBuilder();
        $this->bindColumnBuilder();
    }

    /**
     * Bind the page builder.
     *
     * @return void
     */
    protected function bindPageBuilder()
    {
        $this->app->bind(PageBuilderContract::class, PageBuilder::class);

        $this->app->singleton(PageBuilderContract::class, function ($app) {
            return new PageBuilder(
                $app->make(Page::class),
                $app->make(RowBuilderContract::class)
            );
        });
    }

    /**
     * Bind the row builder.
     *
     * @return void
     */
    protected function bindRowBuilder()
    {
        $this->app->bind(RowBuilderContract::class, RowBuilder::class);

        $this->app->singleton(RowBuilderContract::class, function ($app) {
            return new RowBuilder(
                $app->make(Row::class),
                $app->make(ColumnBuilderContract::class)
            );
        });
    }

    /**
     * Bind the column builder.
     *
     * @return void
     */
    protected function bindColumnBuilder()
    {
        $this->app->bind(ColumnBuilderContract::class, ColumnBuilder::class);

        $this->app->singleton(ColumnBuilderContract::class, function ($app) {
            return new ColumnBuilder(
                $app->make(Column::class),
            );
        });
    }

    protected function facades()
    {
        $this->app->bind('pageschema', function () {
            return new PageSchema();
        });
    }
}
