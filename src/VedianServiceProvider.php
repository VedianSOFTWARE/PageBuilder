<?php

namespace VedianSoft\VedianCms;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as Provider;
use Livewire\Livewire;
use VedianSoft\VedianCms\Contracts\ContainerStylingContract;
use VedianSoft\VedianCms\Contracts\ModelContract;
use VedianSoft\VedianCms\Contracts\StylingContract;
use VedianSoft\VedianCms\Contracts\ViewContract;
use VedianSoft\VedianCms\Livewire\RowToolbar;
use VedianSoft\VedianCms\Livewire\TitleSlugComposer;
use VedianSoft\VedianCms\Models\Page;
use VedianSoft\VedianCms\Service\ContainerStylingService;
use VedianSoft\VedianCms\Service\StylingService;
use VedianSoft\VedianCms\Service\PageService;
use VedianSoft\VedianCms\View\Component\Container;
use VedianSoft\VedianCms\View\Component\Styling;
use VedianSoft\VedianCms\View\ContainerComponent;
use VedianSoft\VedianCms\View\ViewComponent;

/**
 * Class CmsServiceProvider
 *
 * This class is the service provider for the VedianCMS package.
 * It registers and bootstraps the necessary services and components.
 *
 * @package VedianSoft\VedianCms
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
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/auth.php');

        // Register blade components
        Blade::componentNamespace('VedianSoft\\VedianCms\\View', 'vedian');
    }
}
