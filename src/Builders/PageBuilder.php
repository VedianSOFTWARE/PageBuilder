<?php

namespace Vedian\PageBuilder\Builders;

use Vedian\PageBuilder\Contracts\Builders\IPageBuilder;

/**
 * Class PageBuilder
 * 
 * This class provides static methods to retrieve the models used by the Vedian CMS page builder.
 * 
 * @method static view(string $string)
 * @method add($model): void
 * @method make($data = [])
 * 
 * @package Vedian\PageBuilder\Builders
 */
class PageBuilder extends Builder implements IPageBuilder
{

    public function make($data = [])
    {
        $this->page = $data;

        return $this;
    }

    public function save()
    {
        return $this->model->id;
    }
}
