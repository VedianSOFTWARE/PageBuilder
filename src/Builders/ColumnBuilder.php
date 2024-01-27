<?php

namespace VedianSOFT\CMS\Builders;

use VedianSOFT\CMS\Contracts\ColumnContract;

/**
 * Class ColumnBuilder
 * 
 * This class is responsible for building blocks in the VedianSOFT CMS.
 */
class ColumnBuilder extends Builder
{

    public function __construct(
        ColumnContract $model
    ) {
        $this($model);
    }
    
}
