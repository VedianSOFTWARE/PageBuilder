<?php

namespace VedianSOFT\CMS\Controllers;

use VedianSOFT\CMS\Builders\RowBuilder;

/**
 * Class RowController
 * 
 * This class is responsible for handling requests related to rows in the CMS.
 */
class RowController extends Controller
{
    /**
     * Create a new row.
     * 
     * @param RowBuilder $pb The row builder instance.
     * @return int The ID of the created row.
     */
    public function create(RowBuilder $pb)
    {
        dd($pb->getModel(), $this);
        return 666;
    }
}
