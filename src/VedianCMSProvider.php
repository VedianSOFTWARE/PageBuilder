<?php

namespace VedianSoftware\VedianCMS;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use VedianSoftware\VedianCMS\Facades\VedianSchema;
use VedianSoftware\VedianCMS\Support\VedianCMSSupport;
use VedianSoftware\VedianCMS\Support\VedianSchemaSupport;

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
        $this->mergeConfigFrom(__DIR__ . '/../config/vedian.php', 'vedian');

        $this->app->bind('vedian-cms', function () {
            return new VedianCMSSupport();
        });

        $this->app->bind('vedian-schema', function () {
            return new VedianSchemaSupport();
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
                '/../database/migrations' => database_path('migrations/vedian-cms')
        ], 'vedian-cms-migrations');

        // $this->publishes([
        //     __DIR__ . '/../config/app.php' => config_path('vedian-cms.php'),
        // ], 'vedian-cms-config');

        $this->publishes([
            __DIR__ . '/../views' => resource_path('views/vendor/vedian-cms'),
        ], 'vedian-cms-views');

        // Load dependencies
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../views', 'vedian');
        // $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/auth.php');

        // Blade::componentNamespace('VedianSoftware\\Cms\\View\\Html', 'element');
        Blade::componentNamespace('VedianSoftware\\Cms\\View', 'vedian');
    }
}
