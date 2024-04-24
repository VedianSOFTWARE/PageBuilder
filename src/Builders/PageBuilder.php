<?php

namespace Vedian\PageBuilder\Builders;

use Illuminate\Database\Eloquent\Collection;
use Vedian\PageBuilder\Contracts\Builders\IPageBuilder;
use Vedian\PageBuilder\Contracts\IBuilder;
use Vedian\PageBuilder\Contracts\IModel;
use Vedian\PageBuilder\Contracts\Models\IColumn;
use Vedian\PageBuilder\Models\Column;
use Vedian\PageBuilder\Models\Page;
use Vedian\PageBuilder\Models\Row;

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
        
        $this->rows = new Collection;
        $this->columns = new Collection;
    }

    public function prop($key, $value)
    {
        $this->properties->put($key, $value);
        return $this;
    }

    public function row($data = [])
    {
        $row = $this
            ->relation(Row::class)
            ->save($this->rowBuilder($data));

        $builder = PageBuilder::class;
        $builder = new $builder($this->entity, $this->builder);

        $this->builder = $builder;
        $this->builder->entity = $row;

        $this->rows->push($row);

        return $this->builder;
    }

    public function col($data = [])
    {
        $col = $this
            ->relation('columns')
            ->save($this->colBuilder($data));

        $this->columns->push($col);

        return $this;
    }
}
