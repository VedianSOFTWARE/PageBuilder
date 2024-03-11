<?php

namespace Vedian\PageBuilder\Builders;

use Illuminate\Support\Collection;
use Vedian\PageBuilder\Contracts\Builders\IPageBuilder;
use Vedian\PageBuilder\Contracts\IBuilder;
use Vedian\PageBuilder\Contracts\IModel;

/**
 * Class PageBuilder
 * 
 * This class provides static methods to retrieve the models used by the Vedian CMS page builder.
 * 
 * @package Vedian\PageBuilder\Builders
 */
class PageBuilder extends Builder implements IPageBuilder
{
    public Collection $rows;

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
        protected IBuilder|null $builder = null
    ) {
        parent::__construct($model, $builder);
        $this->rows = new Collection();
    }

    public function setBuilderEntity()
    {
        $this->builder->entity = $this->entity;
    }

    public function relation($name = 'rows')
    {
        return $this->entity->{$name}();
    }

    public function row($data = [])
    {
        $this
            ->relation()
            ->save($this->builder($data));

        $this->setBuilderEntity();

        return $this;
    }
}
