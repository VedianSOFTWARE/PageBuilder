<?php

namespace Vedian\PageBuilder\Builders;

use Vedian\PageBuilder\Contracts\Builders\IRowBuilder;

/**
 * Class PageBuilder
 * 
 * This class provides static methods to retrieve the models used by the Vedian CMS page builder.
 */
class RowBuilder extends Builder implements IRowBuilder
{
    public function save()
    {
        return $this->model->id;
    }
}
