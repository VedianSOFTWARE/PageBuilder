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
use Vedian\PageBuilder\Contracts\ColumnContract;
use Vedian\PageBuilder\Contracts\ModelContract;
use Vedian\PageBuilder\Contracts\PageBuilderContract;
use Vedian\PageBuilder\Contracts\PageContract;
use Vedian\PageBuilder\Contracts\RowBuilderContract;
use Vedian\PageBuilder\Contracts\RowContract;
use Vedian\PageBuilder\Models\Column;
use Vedian\PageBuilder\Models\Page;
use Vedian\PageBuilder\Models\Row;
use Vedian\PageBuilder\Support\DefinitionSupport;
use Vedian\PageBuilder\Support\Facades\Vedian;
use Vedian\PageBuilder\Support\PathSupport;
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
            PathSupport::database('migrations') => database_path('migrations/pagebuilder')
        ], 'pagebuilder-migrations');

        $this->publishes([
            PathSupport::views() => resource_path('views/vendor/pagebuilder'),
        ], 'pagebuilder-views');
    }

    /**
     * Load the package resources.
     *
     * @return void
     */
    protected function loading()
    {
        $this->loadMigrationsFrom(PathSupport::database('migrations'));
        $this->loadViewsFrom(PathSupport::views(), 'pagebuilder');
        $this->loadRoutesFrom(PathSupport::routes('web'));
    }

    /**
     * Merge the package configuration.
     *
     * @return void
     */
    protected function merging()
    {
        $this->mergeConfigFrom(PathSupport::config('pagebuilder'), 'pagebuilder');
    }

    /**
     * Bind the service container.
     *
     * @return void
     */
    protected function binding()
    {
        $this->facades();
        
        $this->app->singleton(ModelContract::class, PageContract::class);
        $this->app->singleton(ModelContract::class, RowContract::class);
        $this->app->singleton(ModelContract::class, ColumnContract::class);

        Vedian::buildPagesUsing(Page::class);
        Vedian::buildRowsUsing(Row::class);
        Vedian::buildColumnsUsing(Column::class);
    }

    protected function registerBuilderBindings()
    {
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
    }
}
