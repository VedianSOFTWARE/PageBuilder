<?php

namespace Vedian\PageBuilder\Builders;

use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use Vedian\PageBuilder\Contracts\IBuilder;
use Vedian\PageBuilder\Contracts\IModel;
use Vedian\PageBuilder\Contracts\Models\IRow;
use Vedian\PageBuilder\Models\Column;
use Vedian\PageBuilder\Models\Row;
use Illuminate\Support\Str;

abstract class Builder
{
    public $entity;

    /**
     * Create a new builder instance.
     *
     * @param IModel $model The model to use.
     * @param IBuilder|null $builder The builder to use.
     * @param array $data The data to use.
     * @param array $items The items to use.
     */
    public function __construct(
        protected IModel $model,
        protected IBuilder|null $builder = null,
        public Collection $properties = new Collection
    ) {
    }

    /**
     * Create a new instance of the model.
     *
     * @param array $data The data to use.
     * @return IModel The created model.
     */
    public function builder(string $model, $data)
    {
        return new $model($data);
    }

    public function rowBuilder($data)
    {
        return $this->builder(Row::class, $data);
    }


    public function colBuilder($data)
    {
        return $this->builder(Column::class, $data);
    }

    /**
     * Set the value of the given property.
     *
     * @param string $name The name of the property.
     * @param mixed $value The value of the property.
     */
    public function setPageModel()
    {
        return $this->setEntity($this->createPage());
    }

    /**
     * Set the value of the given property.
     *
     * @param string $name The name of the property.
     * @param mixed $value The value of the property.
     * @return void
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;

        return $this;
    }

    // TODO: Fix this
    private function getMethod(string $method, bool $plural = true)
    {
        $method = Str::of($method)->lower()->plural();
    }

    /**
     * Get the value of the given property.
     *
     * @param string $name The name of the property.
     * @return mixed The value of the property.
     */
    public function relation($relation = Row::class)
    {
        return $this->entity->{$relation}();
    }

    /**
     * Get the value of the given property.
     *
     * @param string $name The name of the property.
     * @return mixed The value of the property.
     */
    public function __get($name)
    {
        return $this->$name ?? null;
    }

    /**
     * Set the value of the given property.
     *
     * @param string $name The name of the property.
     * @param mixed $value The value of the property.
     * @return void
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * Determine if the given property is set.
     *
     * @param string $name The name of the property.
     * @return bool True if the property is set, otherwise false.
     */
    public function __isset($name)
    {
        return isset($this->$name);
    }

    /**
     * Unset the given property.
     *
     * @param string $name The name of the property.
     * @return void
     */
    public function __unset($name)
    {
        unset($this->data[$name]);
    }

    /**
     * Create a new instance of the model.
     *
     * @param array $data The data to use.
     * @return IModel The created model.
     */
    public function create()
    {
        return $this->setPageModel();
    }

    public function createPage()
    {
        return $this->model->create($this->properties->toArray());
    }
}
