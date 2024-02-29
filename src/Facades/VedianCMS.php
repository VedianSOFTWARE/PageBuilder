<?php 

namespace VedianSoftware\VedianCMS\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class VedianCMSFacade
 * 
 * The facade for the Vedian CMS.
 *
 * @package VedianSoftware\VedianCMS
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