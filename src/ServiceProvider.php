<?php

namespace VedianSOFT\CMS;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as Provider;
use VedianSOFT\CMS\Builders\PageBuilder;
use VedianSOFT\CMS\Builders\RowBuilder; // Add this line
use VedianSOFT\CMS\Builders\ColumnBuilder; // Add this line
use VedianSOFT\CMS\Contracts\BuilderContract;
use VedianSOFT\CMS\Contracts\PageContract;
use VedianSOFT\CMS\Contracts\RowContract;
use VedianSOFT\CMS\Contracts\ColumnContract;
use VedianSOFT\CMS\Models\Builder;
use VedianSOFT\CMS\Models\Page;
use VedianSOFT\CMS\Models\Row;
use VedianSOFT\CMS\Models\Column;

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

        // Base builder model bindings
        $this->app->bind(BuilderContract::class, Builder::class);

        // Builder sub-model bindings
        $this->app->bind(PageContract::class, Page::class);
        $this->app->bind(RowContract::class, Row::class);
        $this->app->bind(ColumnContract::class, Column::class);

        // Builder bindings
        $this->app->when(PageBuilder::class)
            ->give(PageContract::class);
        $this->app->when(RowBuilder::class)
            ->give(RowContract::class);

        $this->app->when(ColumnBuilder::class)
            ->give(ColumnContract::class);
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
