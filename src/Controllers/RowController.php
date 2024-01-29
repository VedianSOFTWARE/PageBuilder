<?php

namespace VedianSoft\VedianCms\Controllers;

use VedianSoft\VedianCms\Service\RowService;

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
     * @param RowBuilder $pb The row Service instance.
     * @return int The ID of the created row.
     */
    public function create(RowService $pb)
    {
        dd($pb->getModel(), $this);
        return 666;
    }
}
