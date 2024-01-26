<?php

namespace VedianSOFT\CMS\Builders;

use VedianSOFT\CMS\Contracts\BlockContract;

class BlockBuilder extends Builder
{

    public function __construct(
        BlockContract $model
    ) {
        $this($model);
    }

    /**
     * This code adds protected properties to match the migration row_blocks.
     */
    
}
