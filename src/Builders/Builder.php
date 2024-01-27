<?php

namespace VedianSOFT\CMS\Builders;

use VedianSOFT\CMS\Contracts\BuilderContract;
use VedianSOFT\CMS\Contracts\PageContract;

/**
 * Class Builder
 * 
 * This class represents a builder for creating CMS pages.
 */
class Builder
{
    /**
     * The model instance.
     *
     * @var BuilderContract
     */
    protected $model;

    /**
     * Invokable method for the builder.
     *
     * @param BuilderContract $model The model instance.
     * @return void
     */
    public function __invoke($model)
    {
        $this->setModel($model);
    }

    /**
     * Constructor method for the builder.
     *
     * @param BuilderContract $model The model instance.
     * @return void
     */
    public function __construct(BuilderContract $model)
    {
        $this->setModel($model);
    }

    /**
     * Get the model instance.
     *
     * @return BuilderContract The model instance.
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the model instance.
     *
     * @param BuilderContract $model The model instance.
     * @return void
     */
    public function setModel($model)
    {
        $this->model = $model;
    }
}
