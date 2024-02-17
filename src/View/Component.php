<?php

namespace VedianSoftware\Cms\View;

use Illuminate\View\Component as ViewComponent;
use ReflectionClass;
use VedianSoftware\Cms\Contracts\ViewContract;
use Illuminate\Support\Str;
use Illuminate\View\View as IlluminateView;
use VedianSoftware\Cms\Contracts\ReflectionContract;
use VedianSoftware\Cms\Contracts\StylingContract;

/**
 * Class View
 * 
 * Represents a view in the Vedian CMS.
 *
 * @package VedianCMS\View
 */
class Component extends ViewComponent implements ViewContract
{
    /**
     * @var string The name of the view.
     */
    protected string $view;

    /**
     * @var string The directory where the view is located.
     */
    protected string $directory = 'components';

    /**
     * @var string The namespace of the view.
     */
    protected string $namespace = 'vedian';

    private Collection $viewAttributes;

    /**
     * @var ReflectionClass The reflection of the class.
     */


    /**
     * View constructor.
     */
    public function __construct(
        protected ReflectionClass $reflection,
        protected StylingContract $styling
    ) {
        $this->setView();
        $this->setDirectory();
        $this->setNamespace();

        dd($this->classes);
        dd($this);
    }

    protected function setView(): void
    {
        $this->view = $this->className();
    }

    protected function setR()
    {
        return $this->reflection;
    }

    /**
     * Get the reflection of the class
     */
    public function className()
    {
        return Str::lower($this->reflection->getShortName());
    }


    /**
     * Set the directory property
     */
    protected function setDirectory(): void
    {
        $this->directory = $this->directory;
    }

    /**
     * Set the namespace property
     */
    protected function setNamespace(): void
    {
        $this->namespace = $this->namespace;
    }

    /**
     * Get the view path
     *
     * @return string
     */
    public function path(): string
    {
        return $this->namespace . '::' . $this->directory . '.' . $this->view;
    }

    /**
     * Render the view
     *
     * @return IlluminateView
     */
    public function render(): IlluminateView
    {
        return view($this->path());
    }
}
