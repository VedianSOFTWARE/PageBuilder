<?php 

namespace Vedian\Cms\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void test()
 * 
 * @see Vedian\Cms\Class\PageBuilder
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
        return 'vedian-page-builder';
    }
}