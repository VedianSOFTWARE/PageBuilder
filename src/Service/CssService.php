<?php

namespace VedianSoft\VedianCms\Service;

use ReflectionClass;
use Illuminate\Support\Collection; // Add missing import
use Reflection;
use ReflectionMethod;
use ReflectionParameter;
use VedianSoft\VedianCms\Contracts\CssServiceContract;

/**
 * Represents a CSS class generator.
 * @param private string $maxWidth The maximum width class.
 */
abstract class CssService
{
    public function __construct(
        public CssServiceContract $css,
        // public string $class = '',
        // public string $maxWidth = '',
        // public string $margin = '',
        // public string $padding = '',
        // public string $sm = '',
        // public string $lg = ''
    ) {

        $this->parameters = new Collection();
        $this->classes = new Collection();
        // $this->setReflection();
        // $this->setConstructor();
        // $this->setParameters();
        // $this->setClasses();
        // $this->setHtmlAttr('class', $this->classes->values()->implode(' '));



        // $this->setReflection();
        // $this->setConstructor();
        // $this->setParameters();
        // $this->setClasses();
        // $this->setHtmlAttr('class', $this->classes->values()->implode(' '));

    }
    /**
     * Represents the HTML attributes.
     */
    private array $htmlAttr = [];

    /**
     * Represents the Css class.
     *
     * This class is responsible for handling CSS-related operations.
     */
    private ReflectionClass $reflection;

    /**
     * Represents the constructor method of the Css class.
     */
    private ReflectionMethod $constructor;

    /**
     * Represents the parameters collection of the Css class.
     */
    private Collection $parameters;

    /**
     * Represents the classes collection of the Css class.
     */
    private Collection $classes;

    private function setHtmlAttr($name, $value)
    {
        $this->htmlAttr[$name] = $value;
    }

    /**
     * Sets the reflection object for the Css class.
     *
     * @return void
     */
    private function setReflection(): void
    {
        $this->reflection = new ReflectionClass($this);
    }

    /**
     * Sets the constructor method for the Css class.
     *
     * @return void
     */
    private function setConstructor(): void
    {
        $this->constructor = $this->reflection->getConstructor();
    }

    /**
     * Sets the parameters for the constructor method.
     *
     * @return void
     */
    private function setParameters(): void
    {
        if ($this->constructor) {
            $this->parameters = collect($this->constructor->getParameters());
        }
    }

    /**
     * Sets the classes for the Css instance.
     *
     * @return void
     */
    private function setClasses(): void
    {
        $this->parameters->each(function ($parameter) {
            $this->classes->put($parameter->getName(), $this->{$parameter->getName()});
        });
    }

    /**
     * Converts the Css instance to a string representation.
     *
     * @return string The string representation of the Css instance.
     */
    public function __toString(): string
    {
        return $this->classes->values()->implode(' ');
    }
}
