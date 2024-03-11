<?php

namespace Vedian\PageBuilder\Builders;

use Vedian\PageBuilder\Contracts\Builders\IColumnBuilder;

/**
 * Class PageBuilder
 * 
 * This class provides static methods to retrieve the models used by the Vedian CMS page builder.
 */
class ColumnBuilder extends Builder implements IColumnBuilder
{
    public function make($data = [])
    {
        $this->data = $data;

        return $this;
    }

    public function add($data = [])
    {
        // $this->items[] = $this->model->rows()->create($data);
        $this->data[] = $data;

        return $this;
    }

    public function save()
    {
        return $this->model->id;
    }
}
