<?php

namespace Vedian\PageBuilder\Contracts\Models;

use Vedian\PageBuilder\Contracts\IModel;

interface IRow extends IModel
{
    public function columns();
}
