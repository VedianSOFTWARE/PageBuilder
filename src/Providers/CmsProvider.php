<?php

namespace Vedian\Cms\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Vedian\Cms\Class\PageBuilder;
use Vedian\Cms\Facades\PageSchema;
use Vedian\Cms\Support\Paths;
use Vedian\Cms\Support\Cms;
use Vedian\Cms\Support\Schema;

/**
 * Class CmsServiceProvider
 * 
 * The service provider for the Vedian CMS.
 *
 * @package Cms
 */
class CmsProvider extends ServiceProvider
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
        Blade::componentNamespace('Cms\\View', 'vedian');
    }

    /**
     * Publish the package resources.
     *
     * @return void
     */
    protected function publishing()
    {
        $this->publishes([
            Paths::database('migrations') => database_path('migrations/vedian-cms')
        ], 'vedian-cms-migrations');

        $this->publishes([
            Paths::views() => resource_path('views/vendor/vedian-cms'),
        ], 'vedian-cms-views');
    }

    /**
     * Load the package resources.
     *
     * @return void
     */
    protected function loading()
    {
        $this->loadMigrationsFrom(Paths::database('migrations'));
        $this->loadViewsFrom(Paths::views(), 'vedian');
        $this->loadRoutesFrom(Paths::routes('web'));
    }

    /**
     * Merge the package configuration.
     *
     * @return void
     */
    protected function merging()
    {
        $this->mergeConfigFrom(Paths::config('vedian-cms'), 'vedian');
    }

    /**
     * Bind the service container.
     *
     * @return void
     */
    protected function binding()
    {
        $this->app->bind('vedian-page-builder', function () {
            return new PageBuilder();
        });

        $this->app->bind('vedian-page-schema', function () {
            return new PageSchema();
        });
    }
}
