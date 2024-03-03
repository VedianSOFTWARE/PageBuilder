<?php 

namespace VedianCMS\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void test()
 * 
 * @see \VedianCMS\Support\VedianCMS
 */
class VedianCMS extends Facade 
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'vedian-cms';
    }
}