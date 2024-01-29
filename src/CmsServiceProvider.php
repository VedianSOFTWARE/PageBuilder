<?php

namespace VedianSoft\VedianCms;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as Provider;
use VedianSoft\VedianCms\Builders\ColumnBuilder;
use VedianSoft\VedianCms\Builders\PageBuilder;
use VedianSoft\VedianCms\Builders\RowBuilder;
use VedianSoft\VedianCms\Contracts\ModelContract;
use VedianSoft\VedianCms\Models\Page;
use VedianSoft\VedianCms\Models\Row;
use VedianSoft\VedianCms\Models\Column;

/**
 * Class CmsServiceProvider
 *
 * This class is the service provider for the VedianCMS package.
 * It registers and bootstraps the necessary services and components.
 *
 * @package VedianSoft\VedianCms
 */
class CmsServiceProvider extends Provider
{
    protected $commands = [];

    public function register()
    {
        $this->commands($this->commands);
        $this->bindings();
        $this->mergeConfigFrom(__DIR__ . '/../config/vedian.php', 'vedian');
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
     * Bind the necessary classes to the service container.
     *
     * @return void
     */
    protected function bindings()
    {

        /**
         * Binds the BuilderContract interface to the PageContract class for PageBuilder.
         *
         * @var \VedianSoftware\VedianCms\Contracts\ModelContract $builderContract
         * @var \VedianSoft\VedianCms\Contracts\PageContract $pageContract
         */
        $this->app->when(PageBuilder::class)
            ->needs(ModelContract::class)
                ->give(Page::class);

            /**
             * Binds the BuilderContract interface to the RowContract class for RowBuilder.
             *
             * @var \VedianSoft\VedianCms\Contracts\ModelContract $builderContract
             * @var \VedianSoft\VedianCms\Contracts\RowContract $rowContract
             */
            $this->app->when(RowBuilder::class)
                ->needs(ModelContract::class)
                ->give(Row::class);

            /**
             * Binds the BuilderContract interface to the ColumnContract class for ColumnBuilder.
             *
             * @var \VedianSoft\VedianCms\Contracts\ModelContract $builderContract
             * @var \VedianSoft\VedianCms\Models\ColumnContract $columnContract
             */
            $this->app->when(ColumnBuilder::class)
                ->needs(ModelContract::class)
                ->give(Row::class);
    }


    /**
     * Register the vendor blade components.
     *
     * @return void
     */
    protected function vendorBladeComponents()
    {
        Blade::componentNamespace('VedianSoft\\VedianCms\\Views\\Components', 'vedian');
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
        $this->loadViewsFrom(__DIR__ . '/../views', 'vedian-views');
        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/auth.php');
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
            __DIR__ . '/../config/app.php' => config_path('vedian-cms.php'),
        ], 'vedian-cms-config');

        // Publish views
        $this->publishes([
            __DIR__ . '/../views' => resource_path('views/vendor/vedian-cms'),
        ], 'vedian-cms-views');
    }
}
