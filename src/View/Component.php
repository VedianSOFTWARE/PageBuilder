<?php

namespace VedianSoftware\Cms\View;

use Illuminate\Support\Collection;
use Illuminate\View\Component as ViewComponent;
use ReflectionClass;
use VedianSoftware\Cms\Contracts\ViewContract;
use Illuminate\Support\Str;
use Illuminate\View\View as IlluminateView;
use VedianSoftware\Cms\Contracts\StylingServiceContract;

/**
 * Class Component
 * 
 * Represents a view component in the Vedian CMS.
 *
 * @package VedianSoftware\Cms\View
 */
class Component extends ViewComponent implements ViewContract
{
    /**
     * The HTML content of the component.
     *
     * @var string
     */
    public $html;

    /**
     * The CSS class of the component.
     *
     * @var string
     */
    public $class;

    /**
     * The component attributes.
     *
     * @var \Illuminate\View\ComponentAttributeBag
     */
    public $attributes;

    /**
     * The name of the view.
     *
     * @var string
     */
    protected string $view;

    /**
     * The directory where the view is located.
     *
     * @var string
     */
    protected string $directory = 'components';

    /**
     * The namespace of the view.
     *
     * @var string
     */
    protected string $namespace = 'vedian';

    /**
     * The HTML attributes of the component.
     *
     * @var \Illuminate\Support\Collection
     */
    protected Collection $htmlAttributes;

    /**
     * The CSS class attributes of the component.
     *
     * @var \Illuminate\Support\Collection
     */
    protected Collection $classAttribute;

    /**
     * The reflection class of the component.
     *
     * @var \ReflectionClass
     */
    protected ReflectionClass $reflectionClass;

    /**
     * The styling service contract.
     *
     * @var StylingServiceContract
     */
    protected StylingServiceContract $stylingService;

    /**
     * Component constructor.
     *
     * @param ReflectionClass $reflectionClass The reflection class of the component.
     * @param Collection $services The collection of services.
     */
    public function __construct(
        ReflectionClass $reflectionClass,
        Collection $services
    ) {
        $this->initializeComponent($reflectionClass);
        $this->setServiceContracts($services);
        $this->addHtmlAttribute('class', $this->getComponentClasses());

        $this->withAttributes($this->getHtmlAttributes());
    }

    /**
     * Initialize the HTML and class attributes.
     *
     * @return void
     */
    protected function initializeComponent($reflectionClass): void
    {
        $this->htmlAttributes = collect();
        $this->classAttribute = collect();
        $this->reflectionClass = $reflectionClass;

        $this->setView();
        $this->setDirectory();
        $this->setNamespace();
    }

    /**
     * Set the extra attributes that the slot should make available.
     *
     * @param array $attributes The attributes to be set.
     * @return $this
     */
    public function withAttributes(array $attributes)
    {
        $this->attributes = $this->newAttributeBag($attributes);

        return $this;
    }

    /**
     * Add an HTML attribute to the component.
     *
     * @param string $key The attribute key.
     * @param mixed $values The attribute values.
     * @return void
     */
    protected function addHtmlAttribute($key, $values): void
    {
        $this->htmlAttributes->put($key, $values->implode(' '));
    }

    /**
     * Get the HTML attributes of the component.
     *
     * @return array
     */
    public function getHtmlAttributes(): array
    {
        return $this->htmlAttributes->toArray();
    }

    /**
     * Get the CSS classes of the component.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getComponentClasses(): Collection
    {
        return collect($this->class);
    }

    /**
     * Set the service contracts.
     *
     * @param Collection $services The collection of services.
     * @return void
     */
    protected function setServiceContracts(Collection &$services): void
    {
        $services
            ->mapWithKeys(function ($service, $key) {
                return [$this->getShortName($service, 'Contract') =>  new $service];
            })
            ->each(function ($service, $property) {
                $this->$property = $service;
            });
    }

    /**
     * Get the short name of a class.
     *
     * @param string $service The class name.
     * @param string $replace The string to be replaced.
     * @return string
     */
    private function getShortName($service, $replace = ''): string
    {
        $service = (new ReflectionClass($service))->getShortName();
        $service = Str::of($service)->lcfirst();

        if (!empty($replace)) {
            $service = $service->replace($replace, '');
        }

        return $service->toString();
    }

    /**
     * Set the view name.
     *
     * @return void
     */
    protected function setView(): void
    {
        $this->view = $this->className();
    }

    /**
     * Get the class name of the component.
     *
     * @return string
     */
    public function className(): string
    {
        return Str::lower($this->class()->getShortName());
    }

    /**
     * Get the reflection class of the component.
     *
     * @return \ReflectionClass
     */
    public function class(): ReflectionClass
    {
        return $this->reflectionClass;
    }

    /**
     * Set the directory property.
     *
     * @return void
     */
    protected function setDirectory(): void
    {
        $this->directory = $this->directory;
    }

    /**
     * Set the namespace property.
     *
     * @return void
     */
    protected function setNamespace(): void
    {
        $this->namespace = $this->namespace;
    }

    /**
     * Get the view path.
     *
     * @return string
     */
    public function path(): string
    {
        return $this->namespace . '::' . $this->directory . '.' . $this->view;
    }

    /**
     * Render the view.
     *
     * @return IlluminateView
     */
    public function render(): IlluminateView
    {
        return view($this->path());
    }
}
