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
    protected $cmsBindings = [
        ModelContract::class => [
            PageService::class => Page::class,
        ],
        StylingContract::class => [
            Container::class => ContainerStylingService::class,
        ],
        StylingService::class => [
            Container::class => StylingService::class,
        ],
        ViewContract::class => [
            Container::class => ViewComponent::class,
            // Styling::class => ViewComponent::class,
        ],
    ];


    public function register()
    {

        $this->bindings();
        $this->configs();
    }

    /**
     * This code block represents the current selection.
     * It was generated as a result of a previous interaction with GitHub Copilot.
     * Please refer to the previous messages for more context.
     */
    private function getCmsBindings()
    {
        return $this->walkArrayToCollection($this->cmsBindings);
    }

    private function walkArrayToCollection($array)
    {
        return collect($array)->map(function ($item) {
            if (is_array($item)) {
                return $this->walkArrayToCollection($item);
            }
            return $item;
        });
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

        Livewire::component('vedian::title-slug', TitleSlugComposer::class);
        Livewire::component('vedian::row-toolbar', RowToolbar::class);
    }

    /**
     * Bind the necessary classes to the service container.
     *
     * @return void
     */
    protected function bindings()
    {

        /**
         * Binds the dependencies for the CMS service provider.
         *
         * This method binds the dependencies required by the CMS service provider.
         * It iterates over the CMS bindings and registers them with the application container.
         *
         * @return void
         */
        $this->getCmsBindings()->each(function ($bindings, $needs) {
            $bindings->each(function ($give, $when) use ($needs) {
                $this->app->when($when)
                    ->needs($needs)
                    ->give($give);
            });
        });


        // $this->app->bind(CssContract::class, Container::class);
        // dd(123);
        // $this->app->bind(Container::class, Css::class);
        // $this->app->bind(CssContract::class, CssContainer::class);
        // $this->app->bind(CssContract::class, Css::class);
        // $this->app->bind(CssContainerContract::class, CssContainer::class);

        // /**
        //  * Binds the BuilderContract interface to the PageContract class for PageService.
        //  *
        //  * @var \VedianSoftware\VedianCms\Contracts\ModelContract $ServiceContract
        //  * @var \VedianSoft\VedianCms\Contracts\PageContract $pageContract
        //  */

        // /**
        //  * Binds the BuilderContract interface to the RowContract class for RowService.
        //  *
        //  * @var \VedianSoft\VedianCms\Contracts\ModelContract $ServiceContract
        //  * @var \VedianSoft\VedianCms\Contracts\RowContract $rowContract
        //  */
        // $this->app->when(RowService::class)
        //     ->needs(ModelContract::class)
        //     ->give(Row::class);

        // /**
        //  * Binds the BuilderContract interface to the ColumnContract class for ColumnService.
        //  *
        //  * @var \VedianSoft\VedianCms\Contracts\ModelContract $ServiceContract
        //  * @var \VedianSoft\VedianCms\Models\ColumnContract $columnContract
        //  */
        // $this->app->when(ColumnService::class)
        //     ->needs(ModelContract::class)
        //     ->give(Column::class);

        // $this->app->bind(CssContract::class, Css::class);
        // $this->app->bind(CssContainerContract::class, Container::class);
        // $this->getGiveBinding()->each(function ($concrete, $abstract) {
        //     $this->app->bind($abstract, $concrete);
        // });
    }

    protected function configs()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/vedian-cms.php', 'vedian-cms');
    }

    /**
     * Register the vendor blade components.
     *
     * @return void
     */
    protected function vendorBladeComponents()
    {
        Blade::componentNamespace('VedianSoft\\VedianCms\\View', 'vedian');
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
        $this->loadViewsFrom(__DIR__ . '/../views', 'vedian');
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
