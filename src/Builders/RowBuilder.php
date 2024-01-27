<?php

namespace VedianSOFT\CMS\Builders;

use VedianSOFT\CMS\Contracts\RowContract;

class RowBuilder extends Builder
{
    public function __construct(RowContract $model)
    { 
        $this($model); 
    }
}
