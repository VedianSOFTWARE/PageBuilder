<?php

namespace Vedian\PageBuilder\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Vedian\PageBuilder\Builders\PageBuilder;
use Vedian\PageBuilder\Schema\PageSchema;
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
        $this->app->bind('pagebuilder', function () {
            return new PageBuilder();
        });

        $this->app->bind('pageschema', function () {
            return new PageSchema();
        });
    }
}
