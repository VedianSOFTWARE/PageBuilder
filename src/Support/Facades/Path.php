<?php

namespace Vedian\PageBuilder\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method __call(string $method, array $args)
 * @method src()
 * @method root(string $path = null)
 * @method resources(string $path = null)
 * @method models(string $path = null)
 * 
 * 
 * @see \Vedian\PageBuilder\Support\PathSupport
 */
class Path extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'path-support';
    }
}
