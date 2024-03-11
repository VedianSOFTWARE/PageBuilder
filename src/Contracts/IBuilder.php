<?php

namespace Vedian\PageBuilder\Contracts;


/**
 * Interface IBuilder
 * 
 * This interface provides methods to retrieve the models used by the Vedian CMS page builder.
 * 
 * @see \Vedian\PageBuilder\Builders\Builder
 */
interface IBuilder
{
    public function create();
}