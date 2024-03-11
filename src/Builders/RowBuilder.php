<?php

namespace Vedian\PageBuilder\Builders;

use Vedian\PageBuilder\Contracts\BuilderContract;
use Vedian\PageBuilder\Contracts\RowBuilderContract;

/**
 * Class PageBuilder
 * 
 * This class provides static methods to retrieve the models used by the Vedian CMS page builder.
 */
class RowBuilder extends Builder implements RowBuilderContract
{

    public function save()
    {
        return $this->model->id;
    }
}
