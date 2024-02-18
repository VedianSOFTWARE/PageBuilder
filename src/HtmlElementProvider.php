<?php

namespace VedianSoftware\Cms;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Nette\Utils\Html;
use ReflectionClass;
use VedianSoftware\Cms\Contracts\ReflectionServiceContract;
use VedianSoftware\Cms\Contracts\StylingServiceContract;
use VedianSoftware\Cms\Contracts\View\HtmlContainer;
use VedianSoftware\Cms\Contracts\View\HtmlElement;
use VedianSoftware\Cms\Services\ReflectionService;
use VedianSoftware\Cms\Services\StylingService;
use VedianSoftware\Cms\View\Html\Container;
use VedianSoftware\Cms\View\Html\Element;

class HtmlElementProvider extends ServiceProvider
{
    public $singletons = [
        HtmlContainer::class => Container::class,
        HtmlElement::class => Element::class
    ];

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/vedian.php', 'vedian');

        $this->app->singleton(HtmlContainer::class, Container::class);
        $this->app->singleton(HtmlElement::class, Element::class);
        $this->app->singleton(ReflectionServiceContract::class, ReflectionService::class);


        // $this->app->bind(ReflectionServiceContract::class, function ($app) {
        //     return new ReflectionService(new ReflectionClass(Container::class));
        // });

        $this->app->when(Container::class)
            ->needs('$serviceContracts')
            ->give(collect([
                StylingService::class
            ])->map(function ($arg, $key) {
                return $arg;
            }));

        $this->app->when(Container::class)
            ->needs(ReflectionServiceContract::class)
            ->give(fn () => new ReflectionService(new ReflectionClass(Container::class)));
        // $this->app->bind(ContainerContract::class, Container::class);
        // $this->app->bind(ElementContract::class, ContainerContract::class);

        // $this->app->bind(ReflectionServiceContract::class, ReflectionService::class);

        // $this->bindViewComponents(
        //     Container::class,
        //     [
        //         StylingService::class
        //     ]
        // );
    }

    protected function registerHtmlElementDriver()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Register blade components
        // Blade::componentNamespace('VedianSoftware\\Cms\\View', 'vedian');
    }
}
