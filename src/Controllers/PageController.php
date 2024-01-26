<?php

namespace VedianSOFT\CMS\Controllers;

use VedianSOFT\CMS\Builders\PageBuilder;

/**
 * Class PageController
 * @package VedianSOFT\CMS\Controllers
 */
class PageController extends Controller
{
    /**
     * Create a new page.
     *
     * @param PageBuilder $pb The page builder instance.
     * @return int The created page ID.
     */
    public function create(PageBuilder $pb)
    {
        dd($pb->getModel(), $this);
        return 666;
    }
}
