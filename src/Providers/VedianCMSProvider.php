<?php

namespace VedianSoftware\VedianCMS\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use VedianSoftware\VedianCMS\Support\VedianCMS;
use VedianSoftware\VedianCMS\Support\VedianSchema;

/**
 * Class CmsServiceProvider
 * 
 * The service provider for the Vedian CMS.
 *
 * @package VedianSoftware\VedianCMS
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
        $this->mergeConfigFrom(__DIR__ . '/../Resources/config/vedian-cms.php', 'vedian');

        $this->app->bind('vedian-cms', function () {
            return new VedianCMS();
        });

        $this->app->bind('vedian-schema', function () {
            return new VedianSchema();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // publish dependencies
        $this->publishes([
            __DIR__ .
                '/../Resources/database/migrations' => database_path('migrations/vedian-cms')
        ], 'vedian-cms-migrations');

        // $this->publishes([
        //     __DIR__ . '/../Resources/config/app.php' => config_path('vedian-cms.php'),
        // ], 'vedian-cms-config');

        $this->publishes([
            __DIR__ . '/../Resources/views' => resource_path('views/vendor/vedian-cms'),
        ], 'vedian-cms-views');

        // Load dependencies
        $this->loadMigrationsFrom(__DIR__ . '/../Resources/database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'vedian');
        // $this->loadRoutesFrom(__DIR__ . '/../Resources/routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../Resources/routes/web.php');

        // Blade::componentNamespace('VedianSoftware\\Cms\\View\\Html', 'element');
        Blade::componentNamespace('VedianSoftware\\Cms\\View', 'vedian');
    }
}
