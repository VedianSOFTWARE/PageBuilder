<?php

namespace VedianSOFT\CMS\Controllers;

use VedianSOFT\CMS\Builders\BlockBuilder; // Changed from PageBuilder to BlockBuilder

class BlockController extends Controller
{
    public function create(BlockBuilder $bb)
    {
        dd($bb->getModel(), $this);
        return 666;
    }
}
