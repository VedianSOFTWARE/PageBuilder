<?php

namespace Vedian\PageBuilder\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * 
 * @see \Vedian\PageBuilder\Support\VedianSupport
 */
class Vedian extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'vedian-support';
    }
}
