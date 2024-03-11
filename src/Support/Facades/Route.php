<?php

namespace Vedian\PageBuilder\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * 
 * @see \Vedian\PageBuilder\Support\RouteSupport
 */
class Route extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'route-support';
    }
}
