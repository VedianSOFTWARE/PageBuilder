<?php

namespace VedianSOFT\CMS;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as Provider;
use VedianSOFT\CMS\Builders\Builder;
use VedianSOFT\CMS\Builders\ColumnBuilder;
use VedianSOFT\CMS\Builders\PageBuilder;
use VedianSOFT\CMS\Builders\RowBuilder;
use VedianSOFT\CMS\Contracts\BuilderContract;
use VedianSOFT\CMS\Controllers\PageController;

/**
 * Class ServiceProvider
 *
 * This class is the service provider for the VedianCMS package.
 * It registers and bootstraps the necessary services and components.
 *
 * @package VedianCMS
 */
class ServiceProvider extends Provider
{
    protected $commands = [];

    public function register()
    {
        $this->commands($this->commands);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->vendorLoaders();
        $this->vendorPublishers();
        $this->vendorBladeComponents();
    }


    /**
     * Register the vendor blade components.
     *
     * @return void
     */
    protected function vendorBladeComponents()
    {
        Blade::componentNamespace('VedianSOFT\\CMS\\Views\\Components', 'vedian-cms');
    }

    /**
     * Load the vendor loaders.
     *
     * @return void
     */
    protected function vendorLoaders()
    {
        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        // Load views
        $this->loadViewsFrom(__DIR__ . '/../views', 'vedian-cms-views');
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/cms-route.php', 'vedian-cms-routes');
    }

    /**
     * Get the vendor publishers for the service provider.
     *
     * @return array
     */
    protected function vendorPublishers()
    {
        // Publish migrations
        $this->publishes([
            __DIR__ .
                '/../database/migrations' => database_path('migrations/vedian-cms')
        ], 'vedian-cms-migrations');

        // Publish config file
        $this->publishes([
            __DIR__ . '/../config/cms.php' => config_path('vedian-cms.php'),
        ], 'vedian-cms-config');

        // Publish views
        $this->publishes([
            __DIR__ . '/../views' => resource_path('views/vendor/vedian-cms'),
        ], 'vedian-cms-views');
    }
}
