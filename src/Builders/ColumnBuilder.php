<?php

namespace VedianSoft\VedianCms\Builders;

use VedianSoft\VedianCms\Contracts\ColumnContract;

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
