<?php 

namespace Vedian\PageBuilder\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void test()
 * 
 * @see Vedian\PageBuilder\Builders\PageBuilder
 */
class PageBuilder extends Facade 
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pagebuilder'; 
    }
}