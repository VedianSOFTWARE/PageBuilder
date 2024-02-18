<?php

namespace VedianSoftware\Cms;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Reflection;
use ReflectionClass;
use VedianSoftware\Cms\Contracts\ReflectionServiceContract;
use VedianSoftware\Cms\Contracts\StylingServiceContract;
use VedianSoftware\Cms\Contracts\View\HtmlContainer;
use VedianSoftware\Cms\Contracts\View\HtmlElement;
use VedianSoftware\Cms\Services\ReflectionService;
use VedianSoftware\Cms\Services\StylingService;
use VedianSoftware\Cms\View\Html\Container;
use VedianSoftware\Cms\View\Html\Element;

/**
 * Class CmsServiceProvider
 * 
 * The service provider for the Vedian CMS.
 *
 * @package VedianSoftware\Cms
 */
class VedianCmsProvider extends ServiceProvider
{
    /** 
     * 
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
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

        $this->publishes([
            __DIR__ . '/../config/app.php' => config_path('vedian-cms.php'),
        ], 'vedian-cms-config');

        $this->publishes([
            __DIR__ . '/../views' => resource_path('views/vendor/vedian-cms'),
        ], 'vedian-cms-views');

        // Load dependencies
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadViewsFrom(__DIR__ . '/../views', 'vedian');
        // $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/auth.php');

        Blade::componentNamespace('VedianSoftware\\Cms\\View\\Html', 'element');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function registerHtmlElementDriver()
    {
    }
}
