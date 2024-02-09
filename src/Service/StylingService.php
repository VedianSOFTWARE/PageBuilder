<?php

namespace VedianSoft\VedianCms\Service;

use ReflectionClass;
use Illuminate\Support\Collection; // Add missing import
use Reflection;
use ReflectionMethod;
use ReflectionParameter;
use VedianSoft\VedianCms\Contracts\ServiceContract;

/**
 * Represents a CSS class generator.
 * @param protected string $maxWidth The maximum width class.
 */
class StylingService implements ServiceContract
{
    /**
     * Represents the HTML attributes.
     */
    protected array $htmlAttr = [];

    /**
     * Represents the Css class.
     *
     * This class is responsible for handling CSS-related operations.
     */
    protected ReflectionClass $reflection;

    /**
     * Represents the constructor method of the Css class.
     */
    protected ReflectionMethod $constructor;

    /**
     * Represents the parameters collection of the Css class.
     */
    protected Collection $parameters;

    /**
     * Represents the classes collection of the Css class.
     */
    protected Collection $classes;

    /**
     * Represents the constructor method of the Css class.
     */
    public function init()
    {
        $this->parameters = collect();
        $this->classes = collect();
        $this->setReflection();
        $this->setConstructor();
        $this->setParameters();
        $this->setClasses();
        $this->setHtmlAttr('class', $this->classes->values()->implode(' '));
        // dump($this);
    }


    protected function setHtmlAttr($name, $value)
    {
        $this->htmlAttr[$name] = $value;
    }

    /**
     * Sets the reflection object for the Css class.
     *
     * @return void
     */
    protected function setReflection(): void
    {
        $this->reflection = new ReflectionClass($this);
    }

    /**
     * Sets the constructor method for the Css class.
     *
     * @return void
     */
    protected function setConstructor(): void
    {
        $this->constructor = $this->reflection->getConstructor();
    }

    /**
     * Sets the parameters for the constructor method.
     *
     * @return void
     */
    protected function setParameters(): void
    {
        if ($this->constructor) {
            $this->parameters = collect($this->constructor->getParameters())->reject(function ($parameter) {
                return
                    $this->{$parameter->getName()} instanceof ServiceContract ||
                    !is_string($this->{$parameter->getName()});
            });
        }
    }

    /**
     * Sets the classes for the Css instance.
     *
     * @return void
     */
    protected function setClasses(): void
    {
        $this->parameters->each(function ($parameter) {
            $this->putClasses($parameter);
        });
    }

    protected function putClasses(ReflectionParameter $parameter)
    {
        $this->classes->put($parameter->getName(), $this->{$parameter->getName()});
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
