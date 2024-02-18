<?php

namespace VedianSoftware\Cms;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as Provider;
use Mockery\Matcher\Contains;
use ReflectionClass;
use VedianSoftware\Cms\Contracts\ContainerContract;
use VedianSoftware\Cms\Contracts\ReflectionClassContract;
use VedianSoftware\Cms\Contracts\ReflectionContainerContract;
use VedianSoftware\Cms\Contracts\ReflectionContract;
use VedianSoftware\Cms\Contracts\ReflectionServiceContract;
use VedianSoftware\Cms\Contracts\StylingServiceContract;
use VedianSoftware\Cms\Contracts\ElementContract;
use VedianSoftware\Cms\Services\ReflectionContainer;
use VedianSoftware\Cms\Services\ReflectionService;
use VedianSoftware\Cms\Services\StylingService;
use VedianSoftware\Cms\View\Component;
use VedianSoftware\Cms\View\Component\Styling;
use VedianSoftware\Cms\View\Container;
use VedianSoftware\Cms\View\Panel;

/**
 * Class CmsServiceProvider
 *
 * This class is the service provider for the VedianCMS package.
 * It registers and bootstraps the necessary services and components.
 *
 * @package VedianSoftware\Cms
 */
class CmsServiceProvider extends Provider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/vedian.php', 'vedian');

        $this->app->bind(StylingServiceContract::class, StylingService::class);
        $this->app->bind(ContainerContract::class, Container::class);
        $this->app->bind(ElementContract::class, ContainerContract::class);

        $this->app->bind(ReflectionServiceContract::class, ReflectionService::class);

        $this->bindViewComponents(
            Container::class,
            [
                StylingService::class
            ]
        );
    }
    /**
     * Bind a reflection class to the container.
     *
     * @param string $abstract
     * @return void
     */
    private function bindViewComponents($reflection, $serviceContracts): void
    {
        $this->app->bind($reflection, $this->callbackReflectionClass($reflection, $serviceContracts));
    }

    public function makeViewComponent($reflection, ...$args)
    {
        return $this->callbackReflectionClass($reflection, ...$args);

        // return new $abstract(, $this->app->make(StylingServiceContract::class));
    }

    /**
     * Create a callback for a reflection class.
     *
     * @param string $abstract
     * @return \Closure
     */
    private function callbackReflectionClass($reflection, $serviceContracts)
    {
        return fn () => new $reflection(
            new ReflectionService(new ReflectionClass($reflection)),
            $this->makeServiceContracts($serviceContracts)
        );
    }


    /**
     * Make service contracts.
     *
     * @param array $args
     * @return array
     */
    private function makeServiceContracts($args)
    {
        return collect($args)->map(function ($arg, $key) {
            return $arg;
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
