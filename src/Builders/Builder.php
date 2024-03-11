<?php

namespace Vedian\PageBuilder\Builders;

use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use Vedian\PageBuilder\Contracts\IBuilder;
use Vedian\PageBuilder\Contracts\IModel;

abstract class Builder
{

    public Collection $data;

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
        protected IModel|null $entity = null
    ) {
        $this->data = new Collection();
    }

    public function builder($data)
    {
        $model = $this->builder->model::class;
        return new $model($data);
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
        $this->data[$name] = $value;
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
        $this->entity = $this->model->create(
            $this->data->toArray()
        );

        return $this;
    }
}
