<?php

namespace VedianCMS\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use VedianCMS\Support\VedianPaths;
use VedianCMS\Support\VedianCMS;
use VedianCMS\Support\VedianSchema;

/**
 * Class CmsServiceProvider
 * 
 * The service provider for the Vedian CMS.
 *
 * @package VedianCMS
 */
class VedianCMSProvider extends ServiceProvider
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
        Blade::componentNamespace('VedianCMS\\View', 'vedian');
    }

    /**
     * Publish the package resources.
     *
     * @return void
     */
    protected function publishing()
    {
        $this->publishes([
            VedianPaths::database('migrations') => database_path('migrations/vedian-cms')
        ], 'vedian-cms-migrations');

        $this->publishes([
            VedianPaths::views() => resource_path('views/vendor/vedian-cms'),
        ], 'vedian-cms-views');
    }

    /**
     * Load the package resources.
     *
     * @return void
     */
    protected function loading()
    {
        $this->loadMigrationsFrom(VedianPaths::database('migrations'));
        $this->loadViewsFrom(VedianPaths::views(), 'vedian');
        $this->loadRoutesFrom(VedianPaths::routes('web'));
    }

    /**
     * Merge the package configuration.
     *
     * @return void
     */
    protected function merging()
    {
        $this->mergeConfigFrom(VedianPaths::config('vedian-cms'), 'vedian');
    }

    /**
     * Bind the service container.
     *
     * @return void
     */
    protected function binding()
    {
        $this->app->bind('vedian-cms', function () {
            return new VedianCMS();
        });

        $this->app->bind('vedian-schema', function () {
            return new VedianSchema();
        });
    }
}
