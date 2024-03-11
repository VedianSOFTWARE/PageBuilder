<?php

namespace Vedian\PageBuilder\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

// Contracts
use Vedian\PageBuilder\Contracts\IModel;
use Vedian\PageBuilder\Contracts\Models\IColumn;
use Vedian\PageBuilder\Contracts\Models\IPage;
use Vedian\PageBuilder\Contracts\Models\IRow;

// Models
use Vedian\PageBuilder\Models\Column;
use Vedian\PageBuilder\Models\Page;
use Vedian\PageBuilder\Models\Row;

// Support
use Vedian\PageBuilder\Support\DefinitionSupport;
use Vedian\PageBuilder\Support\Facades\Path;
use Vedian\PageBuilder\Support\Facades\Vedian;
use Vedian\PageBuilder\Support\PathSupport;
use Vedian\PageBuilder\Support\RouteSupport;
use Vedian\PageBuilder\Support\VedianSupport;

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
            Path::database('migrations') => database_path('migrations/pagebuilder')
        ], 'pagebuilder-migrations');

        $this->publishes([
            Path::views() => resource_path('views/vendor/pagebuilder'),
        ], 'pagebuilder-views');
    }

    /**
     * Load the package resources.
     *
     * @return void
     */
    protected function loading()
    {
        $this->loadMigrationsFrom(Path::database('migrations'));
        $this->loadViewsFrom(Path::views(), 'pagebuilder');
        $this->loadRoutesFrom(Path::routes('web'));
    }

    /**
     * Merge the package configuration.
     *
     * @return void
     */
    protected function merging()
    {
        $this->mergeConfigFrom(Path::config('pagebuilder'), 'pagebuilder');
    }

    /**
     * Bind the service container.
     *
     * @return void
     */
    protected function binding()
    {
        $this->facades();

        $this->app->singleton(IModel::class, IPage::class);
        $this->app->singleton(IModel::class, IRow::class);
        $this->app->singleton(IModel::class, IColumn::class);

        Vedian::buildPagesUsing(Page::class);
        Vedian::buildRowsUsing(Row::class);
        Vedian::buildColumnsUsing(Column::class);
    }

    protected function facades()
    {
        // Bind the facades.
        $this->app->bind('definition-support', function () {

            // Return the migration support.
            return new DefinitionSupport();
        });

        // Bind the facades.
        $this->app->bind('path-support', function () {

            // Return the path support.
            return new PathSupport();
        });

        // Bind the facades.
        $this->app->bind('vedian-support', function () {

            // Return the Vedian System Support
            return new VedianSupport();
        });

        // Bind the facades.
        $this->app->bind('route-support', function () {

            // Return the Vedian System Support
            return new RouteSupport();
        });
    }
}
