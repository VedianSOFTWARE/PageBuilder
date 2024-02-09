<?php

namespace VedianSoft\VedianCms\Classes;

use ReflectionClass;
use Illuminate\Support\Collection; // Add missing import
use Reflection;
use ReflectionMethod;
use ReflectionParameter;
use VedianSoft\VedianCms\Contracts\CssContract;

/**
 * Represents a CSS class generator.
 * @param private string $maxWidth The maximum width class.
 */
class Css implements CssContract
{
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

    /**
     * Constructs a new Css instance.
     *
     * @param public string $maxWidth The maximum width class.
     * @param public string $margin The margin class.
     * @param public string $padding The padding class.
     * @param public string $sm The small screen class.
     * @param public string $lg The large screen class.
     */
    public function __construct(
        public string $maxWidth = 'max-w-7xl',
        public string $margin = 'mx-auto',
        public string $padding = 'py-6 px-4',
        public string $sm = 'sm:px-6',
        public string $lg = 'lg:px-8'
    ) {
        $this->parameters = new Collection();
        $this->classes = new Collection();
        $this->setReflection();
        $this->setConstructor();
        $this->setParameters();
        $this->setClasses();
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
