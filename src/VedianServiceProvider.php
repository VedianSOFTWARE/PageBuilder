<?php

namespace VedianSoftware\Cms;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as Provider;
use ReflectionClass;
use VedianSoftware\Cms\View\Container;
use VedianSoftware\Cms\View\Panel;
use VedianSoftware\Cms\View\Component;

/**
 * Class CmsServiceProvider
 *
 * This class is the service provider for the VedianCMS package.
 * It registers and bootstraps the necessary services and components.
 *
 * @package VedianSoftware\Cms
 */
class VedianServiceProvider extends Provider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/vedian.php', 'vedian');

        /**
         * Bind the reflection service to the container.
         */
        $this->bindReflection(Component::class);
        $this->bindReflection(Panel::class);
        $this->bindReflection(Container::class);
    }

    /**
     * Bind a reflection class to the container.
     *
     * @param string $abstract
     * @return void
     */
    private function bindReflection($abstract): void
    {
        $this->app->bind($abstract, $this->callbackReflection($abstract));
    }

    private function callbackReflection($abstract)
    {
        return fn () => new $abstract(new ReflectionClass($abstract));
    }

    /**
     * Bind a reflection class to the container.
     *
     * @param string $abstract
     * @return void
     */
    private function bind($abstract, $concrete): void
    {
        $this->app->bind($abstract, fn () => new $abstract($concrete));
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

        // Register blade components
        Blade::componentNamespace('VedianSoftware\\Cms\\View', 'vedian');
    }
}
