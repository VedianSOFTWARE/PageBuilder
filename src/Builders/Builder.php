<?php

namespace VedianSoft\VedianCms\Builders;

use VedianSoft\VedianCms\Contracts\ModelContract;

/**
 * Class Builder
 * 
 * This class represents a builder for creating CMS pages.
 */
class Builder
{
    /**
     * Constructor method for the builder.
     *
     * @param BuilderContract $model The model instance.
     * @return void
     */
    public function __construct(
        protected ModelContract $model
    ) {
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
