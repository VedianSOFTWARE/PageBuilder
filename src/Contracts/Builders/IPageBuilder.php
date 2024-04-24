<?php

namespace Vedian\PageBuilder\Contracts\Builders;

use Vedian\PageBuilder\Contracts\IBuilder;

/**
 * Interface IPage
 * 
 * This interface defines the methods that must be implemented by the page model.
 * 
 * @method IPageBuilder prop($key, $value)
 * @see \Vedian\PageBuilder\Builders\PageBuilder
 */
interface IPageBuilder extends IBuilder
{
    public function prop($key, $value): IPageBuilder;
    public function row(array $data = []): IBuilder;
}
