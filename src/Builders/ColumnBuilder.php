<?php

namespace Vedian\PageBuilder\Builders;

use Vedian\PageBuilder\Contracts\ColumnBuilderContract;

/**
 * Class PageBuilder
 * 
 * This class provides static methods to retrieve the models used by the Vedian CMS page builder.
 */
class ColumnBuilder extends Builder implements ColumnBuilderContract
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
